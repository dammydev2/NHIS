<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operation extends Model
{
    protected $fillable = [
    	'code',
    	'rec',
    	'added_id',
    	'surgeon',
    	'operation'
    ];
}
