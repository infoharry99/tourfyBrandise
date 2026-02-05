<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioService extends Model
{
    use HasFactory;

    protected $table = 'portfolio_services';

    protected $fillable = [
        'service_name',
        'slug',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public $timestamps = true;
    public function items()
    {
        return $this->hasMany(PortfolioServiceItem::class, 'portfolio_service_id');
    }

}
