<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class HomepageVersion extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'choose_version',
    ];
}
