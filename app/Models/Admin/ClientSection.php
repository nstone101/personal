<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ClientSection extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',  'job', 'feedback', 'star', 'client_image', 'approval',
    ];
}
