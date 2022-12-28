<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Status;
use Inertia\Inertia;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
		/** @var Order $basket */
		$basket = Order::with('products.prices', 'products.shop')
			->where('user_id', auth()->user()->id)
			->where('isBasket', 1)
			->first();
		$this->updateOrderTotal($basket);
        return Inertia::render('Basket', [
			'basket' => $basket,
		]);
    }

	public function addProduct(Request $request)
	{
		/** @var Order $order */
		$order = Order::with('products.prices')->where('user_id', auth()->user()->id)->where('isBasket', 1)->first();
		if ($order) {
			if ($order->products->contains(Product::find($request->data['productId']))) {
				$productQuantity = $order->products()->find($request->data['productId'])->pivot->quantityOrdered;
				$order->products()->updateExistingPivot($request->data['productId'], ['quantityOrdered' => $productQuantity + $request->data['quantity']]);
			} else {
				$order->products()->save(Product::find($request->data['productId']), ['quantityOrdered' => $request->data['quantity']]);
			}
		} else {
			$product = Product::with(['prices', 'shop'])->find($request->data['productId']);
			$order = Order::create([
				'user_id' => auth()->user()->id,
				'isBasket' => 1,
				'status_id' => Status::where('name', 'Panier')->first()->id,
				'total' => $product->prices->first()->unitPrice * $request->data['quantity'],
			]);
			$order->products()->save(Product::find($request->data['productId']), ['quantityOrdered' => $request->data['quantity']]);
		}
		$this->updateOrderTotal($order);
		return redirect()->route('basket.index')->with('success', 'Produit ajouté au panier');
	}

	public function removeProduct(Request $request)
	{
		$order = Order::where('user_id', auth()->user()->id)->where('isBasket', 1)->first();
		$order->products()->detach($request->productId);
		$this->updateOrderTotal($order);
		return redirect()->route('basket.index')->with('success', 'Produit supprimé du panier');
	}

	public function updateProduct(Request $request)
	{
		$order = Order::where('user_id', auth()->user()->id)->where('isBasket', 1)->first();
		if ($request->quantity > 0) {
			$order->products()->updateExistingPivot($request->id, ['quantityOrdered' => $request->quantity]);
		} else {
			$order->products()->detach($request->id);
		}
		$this->updateOrderTotal($order);
		return redirect()->route('basket.index');
	}

	private function updateOrderTotal(Order $order)
	{
		$order->total = 0;
		foreach ($order->products()->get() as $product) {
			$prices = $product->prices()->get();
			foreach ($prices as $price) {
				if (now() > $price->discountedFrom && ($price->discountedUntil > now() || $price->discountedUntil === null)) {
					if ($price->discount !== null && $price->discountedUntil < now() && $price->discountedUntil !== null) {
						$order->total += $price->unitPrice * $product->pivot->quantityOrdered;
					} else {
						if ($price->discount !== null && ($price->discountedUntil === null) OR $price->discountedUntil > now()) {
							$order->total += $price->discountedPrice * $product->pivot->quantityOrdered;
						} else {
							$order->total += $price->unitPrice * $product->pivot->quantityOrdered;
						}
					}
				} else {
					if ($prices->last() !== $price) {
						continue;
					} else {
						if ($price->discount !== null && ($price->discountedUntil === null) OR $price->discountedUntil > now()) {
							$order->total += $price->discountedPrice * $product->pivot->quantityOrdered;
						} else {
							$order->total += $price->unitPrice * $product->pivot->quantityOrdered;
						}
					}
				}
			}
		}
		$order->save();
	}

	public function checkout()
	{
		$order = Order::where('user_id', auth()->user()->id)->where('isBasket', 1)->first();
		$order->isBasket = 0;
		// get all products from basket
		$products = $order->products()->get();
		$shops = [];
		foreach ($products as $product) {
			// get shop from product
			if (!in_array($product->shop, $shops)) {
				$shops[] = $product->shop;
			}
		}
		foreach ($shops as $shop) {
			// get all products from basket for this shop
			$shopProducts = $order->products()->where('shop_id', $shop->id)->get();
			// create new order for this shop
			$shopOrder = Order::create([
				'user_id' => auth()->user()->id,
				'isBasket' => 0,
				'status_id' => Status::where('name', 'Non validée')->first()->id,
				'total' => $order->total,
				'shop_id' => $shop->id,
				'orderNumber' => $this->generateOrderNumber(),
			]);
			// add products to shop order
			foreach ($shopProducts as $shopProduct) {
				$shopOrder->products()->save($shopProduct, ['quantityOrdered' => $shopProduct->pivot->quantityOrdered]);
			}
			// update total for this order
			$this->updateOrderTotal($shopOrder);
		}
		$order->delete();
		return redirect()->route('basket.index')->with('success', 'Commande validée');
	}

	private function generateOrderNumber()
	{
		$number = 'SA-';
		for ($i = 0; $i < 9; $i++) {
			$number .= rand(0, 9);
		}
		return $number;
	}
}
