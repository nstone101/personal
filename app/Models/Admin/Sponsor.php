<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sponsor_image',
    ];
}
