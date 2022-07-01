<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class Physical_Person extends Model
{
    protected $table = 'physical_person';

    protected $fillable = ['cpf', 'birth_date', 'sex'];

    public function Person()
    {
        return $this->belongsTo(Person::class);
    }
}
