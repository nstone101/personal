<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AboutSectionInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'order',
    ];
}
