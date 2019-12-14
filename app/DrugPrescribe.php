<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DrugPrescribe extends Model
{
    protected $fillable = [
    	'rec',
    	'today_num',
    	'added_id',
    	'drug',
    	'name',
    ];
}
