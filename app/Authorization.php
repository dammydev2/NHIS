<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Authorization extends Model
{
    protected $fillable = [
    	'rec',
    	'today_num',
    	'name',
    	'patient_id',
    	'hmo',
    	'nhis',
    	'hospital',
    	'clinic',
    	'authorization',
    	'today',
    ];
}
