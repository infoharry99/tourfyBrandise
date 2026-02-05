<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceFeature extends Model
{
    protected $table = 'service_features';

    protected $fillable = [
        'service_id',
        'feature',
    ];

    public $timestamps = true;

    /**
     * Relationship: feature belongs to a service
     */
    public function service()
    {
        return $this->belongsTo(SkillService::class, 'service_id');
    }
}
