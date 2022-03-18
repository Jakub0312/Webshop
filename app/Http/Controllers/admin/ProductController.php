<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Price;
use App\Models\Pricetype;
use App\Models\Product;
use App\Models\Productstate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $productstates = Productstate::all();
        return view('admin.products.create', compact('categories', 'productstates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * param  \Illuminate\Http\Request  $request
     * return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $products = new Product();
        $products->name = $request->name;
        $products->description = $request->description;
        $products->category_id = $request->category_id;
        $products->specifications = $request->specifications;
        $products->productstate_id = $request->productstate_id;
        $products->stock = $request->stock;
        $products->save();

        return redirect()->route('products.index')->with('message', 'Product succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $productstates = Productstate::all();
        $pricetypes = Pricetype::all();
        return view('admin.products.edit', compact('categories', 'product', 'pricetypes', 'productstates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->name = $request->name;
        $product->description = $request->description;
        $product->specifications = $request->specifications;
        $product->stock = $request->stock;
        $product->productstate_id = $request->productstate_id;
        $product->category_id = $request->category_id;
        $product->save();

        if ($product->latest_price->price != $request->price)
        {
            $price = new Price();
            $price->price = $request->price;
            $price->effdate = Carbon::now();
            $price->product_id = $product->id;
            $price->pricetype_id = '1'; //Voor nu nog 1 aangezien ik niet weet wat ik hiermee moet
            $price->save();
        }

        return redirect()->route('products.index')->with('message', 'Product succesvol geupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function delete(Product $product)
    {
        return view('admin.products.delete', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('message', 'Product succesvol verwijderd');
    }
}
