<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhysicalPerson extends Model
{
    use HasFactory;

    protected $table = 'physical_persons';

    protected $fillable = ['cpf', 'gender'];

    public function setBirth_DateAtrtribute($value)
    {
        $this->attributes['bith_date'] = Carbon::parse($value);
    }

    public function Person()
    {
        return $this->belongsTo(Person::class);
    }
}
