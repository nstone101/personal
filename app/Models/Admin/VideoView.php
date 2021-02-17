<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class VideoView extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'video_link',
    ];
}
