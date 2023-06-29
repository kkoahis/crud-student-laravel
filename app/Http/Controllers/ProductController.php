<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    public function index()
    {
        // paginate(10) means that we want to show 10 products per page.
        $products = Product::paginate(10);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required'
        ]);

        $slug = Str::slug($request->name, '-');

        $newProduct = new Product();
        $newProduct->name = $request->name;
        $newProduct->qty = $request->qty;
        $newProduct->price = $request->price;   
        $newProduct->description = $request->description;
        $newProduct->slug = $slug;
        $newProduct->save();

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    public function edit($slug)
    {
        $product = Product::where('slug', $slug)->first();
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'description' => 'required'
        ]);

        $slug = Str::slug($request->name, '-');

        $product->name = $request->name;
        $product->qty = $request->qty;
        $product->price = $request->price;   
        $product->description = $request->description;
        $product->slug = $slug;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
    }
}
