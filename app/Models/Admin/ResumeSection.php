<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ResumeSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon', 'title', 'description', 'start_year', 'end_year', 'order',
    ];
}
