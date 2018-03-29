<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportData extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'smo_id',
        'registry_id',
        'code_lpu_vz',
        'code_lpu_attachment',
        'code_lpu_attachment',
        'policy',
        'patient',
        'birthday',
        'data_direction',
        'code_lpu_direction',
        'code_service',
        'price',
        'status',
    ];
}
