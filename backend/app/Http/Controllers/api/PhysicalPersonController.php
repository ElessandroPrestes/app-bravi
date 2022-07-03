<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PhysicalPersonResource;
use App\Http\Resources\PhysicalPersonResourceCollection;
use App\Models\PhysicalPerson;

use Illuminate\Http\Request;

class PhysicalPersonController extends Controller
{
    /**
     * @return PhysicalPersonResourceCollection
     */
    public function index(): PhysicalPersonResourceCollection
    {
        return new PhysicalPersonResourceCollection(PhysicalPerson::paginate());
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
            'cpf' => 'required|min:11|unique',
            'birth_date' => 'required',
            'gender' => 'required|max:50',
            'person_id' => 'required',
        ]);

        $physi = PhysicalPerson::create($request->all());

        return new PhysicalPersonResource($physi);
    }

    /**
     * @param PhysicalPerson $physi
     * @return PhysicalPersonResource
     */
    public function show(PhysicalPerson $physi): PhysicalPersonResource
    {
    
        return new PhysicalPersonResource($physi);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhysicalPerson $physi, Request $request): PhysicalPersonResource
    {

        $physi->update($request->all());

        return new PhysicalPersonResource($physi);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param PhysicalPerson $physi
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */

    public function destroy(PhysicalPerson $physi)
    {
        $physi->delete();

        return response()->json();
    }
}
