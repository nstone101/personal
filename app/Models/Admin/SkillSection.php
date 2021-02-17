<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SkillSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'skill_image',
    ];

}
