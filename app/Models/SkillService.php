<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillService extends Model
{
    protected $table = 'skill_services';

    protected $fillable = [
        'title',
        'image',
    ];

    public $timestamps = true;

    /**
     * Relationship: one service has many features
     */
    public function features()
    {
        return $this->hasMany(ServiceFeature::class, 'service_id');
    }
}
