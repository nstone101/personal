<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class FixedContent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'colored_title',  'animated_title_1', 'animated_title_2', 'description',
    ];
}
