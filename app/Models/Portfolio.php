<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolios';

    protected $fillable = [
        'title',
        'description',
        'media_type',
        'media_file',
        'video_url',
        'thumbnail',
        'status',
        'sort_order',
        'processing'
    ];

    protected $casts = [
        'status'      => 'boolean',
        'created_at'  => 'datetime',
        'updated_at'  => 'datetime',
    ];

    /* ================= SCOPES ================= */

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    /* ================= ACCESSORS ================= */

    public function getMediaUrlAttribute()
    {
        if ($this->media_type === 'image' && $this->media_file) {
            return asset($this->media_file);
        }

        if ($this->media_type === 'video') {
            return $this->video_url ?: asset($this->media_file);
        }

        return null;
    }

    public function getThumbnailUrlAttribute()
    {
        return $this->thumbnail ? asset($this->thumbnail) : null;
    }
}
