<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SlotUser extends Model
{
    protected $fillable = [
    	'patient_id',
    	'name',
    	'age',
    	'added_id',
    ];
}
