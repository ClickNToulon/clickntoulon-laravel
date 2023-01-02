<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductType;
use App\Models\Status;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        $products = Product::with('type', 'shop', 'prices');
        // filter by name
		$search = request('search');
        if ($search) {
            $products = $products->where('name', 'like', '%' . $search . '%');
        }
		// filter by type
		$productType = request('types') ?? [];
		if ($productType) {
			$products = $products->whereIn('type_id', $productType);
		}
		if ($productType) {
			$products = $products->whereIn('type_id', $productType);
		}
		// filter by min price
		$onSale = request('on_sale');
		$minPrice = request('min_price');
		if ($minPrice) {
			if ($onSale) {
				$products = $products->whereHas('prices', function ($query) use ($minPrice) {
					$query->where('discountedPrice', '>=', $minPrice);
				});
			} else {
				$products = $products->whereHas('prices', function ($query) use ($minPrice) {
					$query->where('unitPrice', '>=', $minPrice);
				});
			}
		}
		// filter by max price
		$maxPrice = request('max_price');
		if ($maxPrice) {
			if ($onSale) {
				$products = $products->whereHas('prices', function ($query) use ($maxPrice) {
					$query->where('discountedPrice', '<=', $maxPrice);
				});
			} else {
				$products = $products->whereHas('prices', function ($query) use ($maxPrice) {
					$query->where('unitPrice', '<=', $maxPrice);
				});
			}
		}
		// filter by on_sale
		if ($onSale) {
			// check if price discount is greater than 0 and discountedUntil is in the future
			$products = $products->whereHas('prices', function ($query) {
				$query->where('discount', '>', 0)->where('discountedUntil', '>', now());
			});
		}
        $products = $products->paginate(12);
        return Inertia::render('Products/Index', [
            'products' => $products,
            'types' => ProductType::all(),
            'productType' => $productType,
			'onSale' => $onSale,
			'minPrice' => $minPrice,
			'maxPrice' => $maxPrice,
        ]);
    }

    /**
     * Search for a product.
     *
     * @return \Inertia\Response
     */
    public function search(): \Inertia\Response
    {
        $products = Product::with('type', 'price');
        if(\request('search')) {
            $products = $products->where('name', 'like', '%' . \request('search') . '%');
        }
        if (\request()->has('types') and request('search') !== null) {
            $products = $products->orWhere('product_type_id', 'IN' . implode(',', \request('types')) . ')');
        } else {
            $products = $products->where('product_type_id', 'IN' . implode(',', \request('types')) . ')');
        }
        return Inertia::render('Products/Index', [
            'products' => $products->paginate(12),
            'types' => ProductType::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Inertia\Response
     */
    public function show(int $id): \Inertia\Response
    {
        $product = Product::with('type', 'prices', 'shop')->findOrFail($id);
        return Inertia::render('Products/Show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
