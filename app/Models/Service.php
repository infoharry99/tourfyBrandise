<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'title',
        'description',
        'icon',
        'status',
        'sort_order',
    ];

    protected $casts = [
        'status'     => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /* ================= SCOPES ================= */

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }

    /* ================= ACCESSORS ================= */

    public function getIconUrlAttribute()
    {
        // If icon is an image path
        if ($this->icon && str_contains($this->icon, '/')) {
            return asset($this->icon);
        }

        // Otherwise treat as icon class (FontAwesome / Bootstrap)
        return null;
    }
}
