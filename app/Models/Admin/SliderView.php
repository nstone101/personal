<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SliderView extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slider_image', 'order',
    ];
}
