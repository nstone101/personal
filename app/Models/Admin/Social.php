<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'social_media', 'link' ,'status',
    ];
}
