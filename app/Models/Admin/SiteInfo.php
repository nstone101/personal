<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'favicon', 'white_logo', 'colored_logo', 'footer_logo', 'copyright',
    ];


}
