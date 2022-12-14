<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Defines a Shop model. A shop is a physical shop that sells products and takes orders from users.
 *
 * @author Corentin Thibaud <corentin.thibaud@clickntoulon.fr>
 * @author Quentin Boitel <quentin.boitel@clickntoulon.fr>
 * @version 0.1.0
 *
 * @property-read int $id
 * @property string $name
 * @property string $slug
 * @property string $address
 * @property string $city
 * @property string $postalCode
 * @property string $email
 * @property int|null $phone
 * @property string $image
 * @property bool $isBanned
 * @property bool $isVerified
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|null $products
 * @property-read \Illuminate\Database\Eloquent\Collection|null $payments
 * @property BelongsTo|null $tag
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Shop extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
        'address',
        'city',
        'postalCode',
        'phone',
        'email',
        'image',
        'isBanned',
        'isVerified'
    ];

    /**
     * Returns the payments of the shop.
     *
     * @return BelongsToMany
     */
    public function payments(): BelongsToMany
    {
        return $this->belongsToMany(Payment::class);
    }

    /**
     * Returns the products of the shop.
     *
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Returns the tag of the shop.
     *
     * @return BelongsTo
     */
    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    /**
     * @return HasMany
     */
    public function timetable(): HasMany
    {
        return $this->hasMany(Timetable::class);
    }
}
