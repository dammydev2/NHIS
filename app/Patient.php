<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
    	'name', 'patient_id', 'nhis_id', 'hmo', 'phone', 'ministry', 'address', 'gender', 'dob', 'marital', 'occupation', 'religion', 'relationship', 'summary', 'diagnosis', 'date'
    ];
}
