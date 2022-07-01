<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class Contact extends Model
{
    protected $table = 'contact';

    protected $fillable = ['email', 'whatsapp', 'telefone', 'person_id'];

    public function Person()
    {
        return $this->belongsTo(Person::class);
    }
}
