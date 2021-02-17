<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ExternalUrl extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'btn_name',  'btn_link', 'status',
    ];
}
