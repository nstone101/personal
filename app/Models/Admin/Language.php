<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'language_name', 'language_code', 'status',
    ];
}
