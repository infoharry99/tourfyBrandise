<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSectionImage extends Model
{
    protected $table = 'homepage_section_images';

    protected $fillable = [
        'image_path',
        'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public $timestamps = true;
}
