<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class TeamSection extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',  'job', 'facebook', 'twitter', 'instagram', 'team_image',
    ];
}
