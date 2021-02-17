<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class WorkshopSlider extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'workshop_preview_id', 'slider_image', 'order',
    ];

    public function workshop_preview()
    {
        return $this->belongsTo('App\Models\Admin\WorkshopPreview','workshop_preview_id','id');
    }
}
