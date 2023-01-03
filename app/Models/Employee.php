<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Carbon;

/**
 * Defines a Employee model. An employee is an authenticated person that can store data about shops, products and update orders.
 *
 * @author Corentin THIBAUD<corentin.thibaud@clickntoulon.fr>, Quentin BOITEL<quentin.boitel@clickntoulon.fr>
 * @version 0.1.0
 *
 * @property-read int $id
 * @property int $shop_id
 * @property string $full_name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string|null $phone
 * @property bool $is_admin
 * @property bool $isVerified
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property Carbon|null $email_verified_at
 */
class Employee extends Authenticatable
{
    use HasFactory;

	/**
	 * The attributes that are mass assignable.
	 */
	protected $fillable = [
		'shop_id',
		'full_name',
		'email',
		'password',
		'phone',
		'is_admin',
		'isVerified',
	];

	/**
	 * The attributes that should be hidden for serialization.
	 */
	protected $hidden = [
		'password',
		'remember_token',
	];

	/**
	 * The attributes that should be cast to native types.
	 */
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	 * Get the shop that owns the employee.
	 * @return BelongsTo
	 */
	public function shop(): BelongsTo
	{
		return $this->belongsTo(Shop::class);
	}
}
