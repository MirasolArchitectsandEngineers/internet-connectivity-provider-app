<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'sites_blacklist' => 'array',
        'sites_whitelist' => 'array',
    ];

    public function router()
    {
        return $this->belongsTo(Router::class);
    }

    public function devices()
    {
        return $this->hasMany(TicketDevice::class);
    }
}
