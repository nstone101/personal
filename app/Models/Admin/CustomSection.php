<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CustomSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'order', 'btn_name', 'btn_link',
    ];
}
