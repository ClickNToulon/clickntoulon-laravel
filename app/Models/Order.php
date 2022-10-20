<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Defines an Order model. A user can create an order to buy products. An order is also a basket if the property isBasket is true.
 *
 * @author Corentin Thibaud <corentin.thibaud@clickntoulon.fr>
 * @author Quentin Boitel <quentin.boitel@clickntoulon.fr>
 * @version 0.1.0
 *
 * @property-read int $id
 * @property string|null $orderNumber
 * @property bool $isBasket
 * @property array $quantity
 * @property float $total
 * @property \Illuminate\Database\Eloquent\Collection|null $products
 * @property \Illuminate\Database\Eloquent\Relations\BelongsTo $status
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 *
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'orderNumber',
        'isBasket',
        'quantity',
        'total',
    ];

    /**
     * Returns the products that are in this order.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * Returns the status of this order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
