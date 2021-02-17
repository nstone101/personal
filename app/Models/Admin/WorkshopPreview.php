<?php

namespace App\Models\Admin;

use App\Traits\Shareable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class WorkshopPreview extends Model
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
                'source' => 'project_name',
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
            'title' => 'project_name'
        ],
        'url' => null
    ];
    public function getUrlAttribute()
    {
        return view('frontend.portfolio-page.show', $this->slug);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'workshop_category_id', 'workshop_category_name', 'preview_image', 'project_name',
        'description', 'client', 'value', 'author', 'start_date', 'end_date', 'slug',
    ];

    public function workshop_category()
    {
        return $this->belongsTo('App\Models\Admin\WorkshopCategory','workshop_category_id','id');
    }
}
