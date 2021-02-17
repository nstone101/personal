<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'workshop_preview_id', 'blog_id', 'name', 'comment', 'page', 'approval',
    ];
}
