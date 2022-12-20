<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
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
        $products = Product::with('productType', 'price', 'shop');
        $search = request('search');
        if ($search) {
            $products = $products->where('name', 'like', '%' . $search . '%');
        }
        $productType = request('types');
        if ($productType) {
            $products = $products->where('product_type_id', $productType);
        }
        // check if on sales
        $onSale = request('on_sale');
        if ($onSale) {
            $products = $products->whereHas('price', function ($query) {
                $query->where('product_prices.unitPriceDiscount', '>', 0);
            });
        }
        // filter by min price
        $minPrice = request('min_price');
        if ($minPrice) {
            $products = $products->whereHas('price', function ($query) use ($minPrice) {
                $query->where('product_prices.unitPrice', '>=', $minPrice);
            });
        }
        // filter by max price
        $maxPrice = request('max_price');
        if ($maxPrice) {
            $products = $products->whereHas('price', function ($query) use ($maxPrice) {
                $query->where('product_prices.unitPrice', '<=', $maxPrice);
            });
        }
        return Inertia::render('Products/Index', [
            'products' => $products->paginate(12),
            'types' => ProductType::all(),
            'productType' => $productType,
        ]);
    }

    /**
     * Search for a product.
     *
     * @return \Inertia\Response
     */
    public function search(): \Inertia\Response
    {
        $products = Product::with('productType', 'price');
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
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
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
