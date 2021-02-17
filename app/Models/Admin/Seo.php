<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'site_name',  'site_description', 'site_keywords',
        'fb_app_id',
    ];
}
