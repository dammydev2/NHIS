<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ICD extends Model
{
	protected $fillable = [
		'rec',
		'today_num',
		'surname',
		'other_name',
		'added_id',
		'address',
		'date',
		'email',
		'spouse',
		'gender',
		'kin',
		'kin_address',
		'xray',
		'kin_phone',
		'domicile',
		'nationality',
		'occupation',
		'spouse',
		'date_acceptance',
		'referred',
		'surgeon',
		'ward',
		'discharged',
		'discharged_to',
		'condition',
	];
}
