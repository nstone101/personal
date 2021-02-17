<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'about_me', 'about_image', 'video_link', 'cv_file',
    ];
}
