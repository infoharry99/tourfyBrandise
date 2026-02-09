<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $table = 'team_members';

    protected $fillable = [
        'name',
        'designation',
        'image_path',
        'x_url',
        'fb_url',
        'insta_url',
        'linkedin_url',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public $timestamps = true;
}
