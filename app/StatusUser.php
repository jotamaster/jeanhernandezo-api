<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusUser extends Model
{
    protected $fillable = [
        'name', 'slug', 'value',
    ];
}
