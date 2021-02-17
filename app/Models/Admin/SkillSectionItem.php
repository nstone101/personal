<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class SkillSectionItem extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'text', 'percent', 'order',
    ];

}
