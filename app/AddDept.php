<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddDept extends Model
{
    protected $fillable = [
    	'rec',
    	'today_num',
    	'dept',
    	'today',
    ];
}
