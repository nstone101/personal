<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class WhyChooseSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'why_choose_image',
    ];

}
