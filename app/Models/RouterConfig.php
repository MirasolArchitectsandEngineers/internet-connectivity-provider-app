<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class RouterConfig extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'data_limit' => 'array',
        'download_speed_limit' => 'array',
        'upload_speed_limit' => 'array',
        'disable_access' => 'array',
        'sites_allowed' => 'array',
        'sites_denied' => 'array',
    ];
}
