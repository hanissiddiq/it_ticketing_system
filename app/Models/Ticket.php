<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Ticket extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [

        'ticket_number',

        'subject',

        'description',

        'requester_id',

        'assigned_to',

        'department_id',

        'category_id',

        'sub_category_id',

        'priority_id',

        'status',

        'due_at',

        'resolved_at',

        'closed_at',

    ];

    protected $casts = [

        'due_at'=>'datetime',

        'resolved_at'=>'datetime',

        'closed_at'=>'datetime',

    ];

    /*
    |--------------------------------------------------------------------------
    | Relationship
    |--------------------------------------------------------------------------
    */

    public function requester(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'requester_id'
        );
    }

    public function assignee(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'assigned_to'
        );
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(
            Department::class
        );
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(
            Category::class
        );
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(
            SubCategory::class
        );
    }

    public function priority(): BelongsTo
    {
        return $this->belongsTo(
            Priority::class
        );
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function assignments(): HasMany
    {
        return $this->hasMany(TicketAssignment::class)
            ->latest('assigned_at');
    }
}
