<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class DeviceUserGroup extends Model
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

    public function parent()
    {
        return $this->belongsTo(DeviceUserGroup::class, 'parent_id');
    }

    public function router()
    {
        return $this->belongsTo(Router::class);
    }

    public function children()
    {
        return $this->hasMany(DeviceUserGroup::class, 'parent_id');
    }

    public function users()
    {
        return $this->hasMany(DeviceUser::class);
    }
}
