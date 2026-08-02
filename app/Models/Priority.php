<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Priority extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'code',

        'name',

        'color',

        'response_time',

        'resolution_time',

        'is_active'

    ];

    protected $casts = [

        'is_active'=>'boolean'

    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}