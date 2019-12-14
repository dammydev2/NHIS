<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Addcare extends Model
{
    protected $fillable = [
    	'rec',
    	'name',
    	'age',
    	'added_id',
    	'date',
    	'today_num',
    ];
}
