<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Router extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    public function groups()
    {
        return $this->hasMany(DeviceUserGroup::class);
    }
}
