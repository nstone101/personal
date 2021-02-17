<?php

namespace App\Models\Admin;

use App\Traits\Shareable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use Sluggable;
    use Shareable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
                'maxLength'          => null,
                'maxLengthKeepWords' => true,
                'method'             => null,
                'separator'          => '-',
                'unique'             => true,
                'uniqueSuffix'       => null,
                'includeTrashed'     => false,
                'reserved'           => null,
                'onUpdate'           => false
            ]
        ];
    }

    // Share social media
    protected $shareOptions = [
        'columns' => [
            'title' => 'title'
        ],
        'url' => null
    ];
    public function getUrlAttribute()
    {
        return view('frontend.blog-page.show', $this->slug);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'category_name', 'title', 'short_description', 'description', 'blog_image', 'slug', 'view', 'featured',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Category','category_id','id');
    }

}
