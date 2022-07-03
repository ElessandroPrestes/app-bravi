<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Contact;
use App\Models\Physical_Person;

class Person extends Model
{

    use HasFactory;
    
    protected $table = 'persons';
    
    protected $fillable = ['name', 'address', 'number', 'zipcode', 'city', 'UF'];

   public function contacts()
   {
    return $this->hasMany(Contact::class, 'person_id');
   }
   
   public function physicalPersons()
   {
    return $this->hasOne(PhysicalPerson::class, 'person_id');
   }
}
