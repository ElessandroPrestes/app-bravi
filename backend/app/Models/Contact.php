<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Person;

class Contact extends Model
{
    use HasFactory;

    protected $table = 'contacts';

    protected $fillable = ['email', 'whatsapp', 'telefone', 'person_id'];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
