<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

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
 * @property float $total
 * @property Collection|null $products
 * @property BelongsTo $status
 * @property Carbon $created_at
 * @property Carbon $updated_at
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
		'user_id',
		'shop_id',
        'orderNumber',
        'isBasket',
		'total',
		'status_id',
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
     * Get the user that owns the order.
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

	/**
	 * Get the shop that owns the order.
	 */
	public function shop(): BelongsTo
	{
		return $this->belongsTo(Shop::class);
	}

    /**
     * Get the products for the order.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('quantityOrdered');
    }

    /**
     * Get the status of the order.
     */
    public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    }
}
