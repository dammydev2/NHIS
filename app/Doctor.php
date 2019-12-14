<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
    	'rec',
    	'today_num',
    	'added_id',
    	'question',
    	'answer',
    	'choose',
    	'doctor',
    ];
}
