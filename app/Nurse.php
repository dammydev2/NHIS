<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nurse extends Model
{
    protected $fillable = [
    	'rec',
    	'added_id',
    	'temperature',
    	'BP',
    	'weight',
    	'height',
    	'pulse',
    	'sight',
        'date',
        'today_num',
    ];
}
