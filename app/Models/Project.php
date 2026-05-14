<?php

namespace App\Models;

use App\Enums\ProjectStatus;
use App\Enums\ProjectType;
use App\Enums\Tech;
use Illuminate\Database\Eloquent\Casts\AsEnumCollection;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description_pl',
        'description_en',
        'status',
        'type',
        'github_url',
        'live_url',
        'tech_stack',
    ];

    protected $casts = [
        'tech_stack' => AsEnumCollection::class . ':' . Tech::class,
        'status' => ProjectStatus::class,
        'type' => ProjectType::class
    ];
}
