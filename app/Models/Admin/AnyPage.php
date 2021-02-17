<?php

namespace App\Models\Admin;

use App\Traits\Shareable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class AnyPage extends Model
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
                'source' => 'page_title',
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
            'page_title' => 'page_title'
        ],
        'url' => null
    ];
    public function getUrlAttribute()
    {
        return view('frontend.any-page.show', $this->slug);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'page_title', 'description', 'breadcrumb_image', 'order', 'status', 'slug',
    ];


}
