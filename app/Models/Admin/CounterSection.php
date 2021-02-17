<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CounterSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'icon', 'timer', 'heading',
    ];

}
