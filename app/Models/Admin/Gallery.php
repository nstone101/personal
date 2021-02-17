<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'gallery_category_id', 'gallery_category_name', 'gallery_image',
        'display_name', 'note', 'external_url', 'order', 'status',
    ];

    public function gallery_category()
    {
        return $this->belongsTo('App\Models\Admin\GalleryCategory','gallery_category_id','id');
    }
}
