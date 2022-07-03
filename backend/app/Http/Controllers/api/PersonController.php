<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Models\Person;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    
    /**
     * @return PersonResourceCollection
     */
    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    $data = $request->all();
       $validate =  Validator::make($data,[
            'name' => 'required|max:100',
            'street' => 'required|max150',
            'streetNumber' => 'required|max:10',
            'neighborhood' => 'required|max:150',
            'zipcode' => 'required|max:9',
            'city' => 'required',
            'UF' => 'required|max:2',
        ]);

        if($validate->fails()){
            return response(['error' => $validate->errors()], 200);
        }

        $person = Person::create($data);

        if($person->id)
        {
            return new PersonResource($person);
        }
        
        return $this->error('Erro ao cadastrar Pessoa.');
    }


    /**
     * @param Person $person
     * @return PersonResource
     */
    public function show(Person $person): PersonResource
    {
        
            return new PersonResource($person);  
           
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Person $person, Request $request): PersonResource
    {
    
        $person->update($request->all());

        return new PersonResource($person);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param Person $person
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
   
    public function destroy(Person $person)
    {
        $person->delete();

        return response()->json();
    }
}
