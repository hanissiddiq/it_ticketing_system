<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'employee_id',

    'name',

    'email',

    'password',

    'department_id',

    'position',

    'phone',

    'avatar',

    'is_active'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
			'is_active'=>'boolean',
        ];
    }
	
	public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function assignedTickets(): HasMany
    {
        return $this->hasMany(
            TicketAssignment::class,
            'assigned_to'
        );
    }

    public function assignedByMe(): HasMany
    {
        return $this->hasMany(
            TicketAssignment::class,
            'assigned_by'
        );
    }
}
