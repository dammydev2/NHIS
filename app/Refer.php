<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Refer extends Model
{
    protected $fillable = [
    	'rec',
    	'today_num',
    	'added_id',
    	'reffered',
    	'name',
    ];
}
