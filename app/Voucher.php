<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = [
    	'rec',
    	'today_num',
    	'voucher',
    	'today',
    ];
}
