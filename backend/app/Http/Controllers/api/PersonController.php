<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Person;
use App\Models\Physical_Person;

class PersonController extends Controller
{
    
    public function index()
    {
        //
    }

    private function getData()
    {
        return[

            'person' => Person::all(),
            'contact' => Contact::all(),
            'physical_person' => Physical_Person::all(),
        ];
    }

    public function store(Request $request)
    {
        
    }

    
    public function show($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
