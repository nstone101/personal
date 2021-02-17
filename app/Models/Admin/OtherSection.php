<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class OtherSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'section', 'status',
    ];
}
