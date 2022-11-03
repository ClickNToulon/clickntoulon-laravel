<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property float $unitPriceDiscount
 * @property float $vat
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
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
        'vat',
        'startDate',
        'endDate'
    ];

    /**
     * Returns the product that has this price.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
