<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TicketStatus extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'code',

        'name',

        'color',

        'sort_order',

        'is_default',

        'is_closed',

        'is_active'

    ];

    protected $casts = [

        'is_default'=>'boolean',

        'is_closed'=>'boolean',

        'is_active'=>'boolean'

    ];

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
}
