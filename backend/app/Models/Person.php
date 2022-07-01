<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;
use App\Models\Physical_Person;

class Person extends Model
{
    protected $table = 'person';

    protected $fillable = ['name', 'address', 'number', 'zipcode', 'city', 'uf'];

   public function Contacts()
   {
    return $this->hasMany(Contact::class);
   }
   
   public function Physical_Persons()
   {
    return $this->hasMany(Physical_Person::class);
   }
}
