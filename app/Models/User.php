<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Defines a User model. A user is an authenticated person that can store data about shops, products and create orders.
 *
 * @author Corentin Thibaud <corentin.thibaud@clickntoulon.fr>
 * @author Quentin Boitel <quentin.boitel@clickntoulon.fr>
 * @version 0.1.0
 *
 * @property-read int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property int|null $phone
 * @property bool $isBanned
 * @property bool $isVerified
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Database\Eloquent\Collection|null $roles
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'phone',
        'isBanned',
        'isVerified',
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
     * Get orders for the user.
     */
    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }
}
