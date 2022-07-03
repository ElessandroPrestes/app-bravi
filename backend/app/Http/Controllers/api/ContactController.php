<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContactResource;
use App\Http\Resources\ContactResourceCollection;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * @return ContatcResourceCollection
     */
    public function index(): ContactResourceCollection
    {
        return new ContactResourceCollection(Contact::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email|required|unique:users',
            'whatsapp' => 'required|numeric|unique:users',
            'phone' => 'required|numeric|unique:users',
            'person_id' => '',
        ]);

        $contact = Contact::create($request->all());

        return new ContactResource($contact);
    }

    /**
     * @param Contatc $contact
     * @return ContactResource
     */
    public function show(Contact $contact): ContactResource
    {
        return new ContactResource($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Contact $contact, Request $request): ContactResource
    {

        $contact->update($request->all());

        return new ContactResource($contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Contact $contact
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return response()->json();
    }
}
