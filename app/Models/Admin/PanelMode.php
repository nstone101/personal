<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class PanelMode extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'mode',
    ];
}
