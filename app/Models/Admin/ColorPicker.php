<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ColorPicker extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'color_code',  'rgba', 'footer_color_code', 'copyright_code',
    ];
}