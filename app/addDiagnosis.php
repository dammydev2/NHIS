<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class addDiagnosis extends Model
{
    protected $fillable = [
    	'rec',
    	'today_num',
    	'added_id',
    	'diagnosis',
    	'code',
    ];
}
