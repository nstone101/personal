<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class ContactSection extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',  'email', 'subject', 'message', 'read',
    ];
}
