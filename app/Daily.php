<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    protected $fillable = [
    	'date',
    	'today_num',
    ];
}
