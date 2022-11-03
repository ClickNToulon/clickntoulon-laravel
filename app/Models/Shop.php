<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Database\Eloquent\Relations\BelongsTo|null $tag
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function payments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Payment::class);
    }

    /**
     * Returns the products of the shop.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Returns the tag of the shop.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
