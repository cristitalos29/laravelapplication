<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'name',
        'email',
        'password',
        'role_id', // Include 'role_id' in the mass assignable attributes
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Default values for attributes.
     *
     * @var array<string, mixed>
     */
    protected $attributes = [
        'role_id' => 1, // Default role_id value (assuming 'user' role has ID 1)
    ];

    /**
     * Relationship with roles
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    /**
     * Check if the user has a specific role
     *
     * @param  string $role
     * @return bool
     */
    public function hasRole($roleId)
    {
        return $this->role_id === $roleId;
    }
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    /**
     * Set the user's role
     *
     * @param  int $roleId
     * @return $this
     */
    public function setRole($roleId)
    {
        $this->attributes['role_id'] = $roleId;

        return $this;
    }
}
