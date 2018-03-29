<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lpu extends Model
{
    protected $fillable = ['code', 'full_lpu', 'short_lpu'];
}
