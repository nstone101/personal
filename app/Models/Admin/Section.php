<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'heading', 'description', 'section', 'status',
    ];
}
