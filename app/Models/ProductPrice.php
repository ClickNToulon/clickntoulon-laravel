<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * Defines a ProductPrice model. A productPrice is a set of prices and characteristics of a product.
 *
 * More explicite : the majority of products don't have the same prices in every shop. This class is here to correct this missmanagement.
 * One product could be priced differently in different regions.
 *
 * @author Corentin Thibaud <corentin.thibaud@clickntoulon.fr>
 * @author Quentin Boitel <quentin.boitel@clickntoulon.fr>
 * @version 0.1.0
 *
 * @property-read int $id
 * @property float $unitPrice
 * @property float $discount
 * @property float $discountedPrice
 * @property float $vat
 * @property float $vatPrice
 * @property Carbon $discountedFrom
 * @property Carbon $discountedUntil
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 * @mixin Builder
 */
class ProductPrice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'unitPrice',
        'discount',
        'discountedPrice',
        'vat',
        'vatPrice',
        'discountedFrom',
        'discountedUntil'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<int, string>
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Get the product that owns the price.
     */
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
