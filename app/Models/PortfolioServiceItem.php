<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioServiceItem extends Model
{
    use HasFactory;

    protected $table = 'portfolio_service_items';

    protected $fillable = [
        'portfolio_service_id',
        'title',
        'description',
        'image',
        'sort_order',
        'is_active',
        'visit_url',
        'video',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public $timestamps = true;

    /**
     * Relation: Item belongs to a service
     */
    public function service()
    {
        return $this->belongsTo(PortfolioService::class, 'portfolio_service_id');
    }
}
