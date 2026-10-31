<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('products', ['products' => Product::all()]);
    }

    public function create()
    {
        return view('product_create', ['categories' => ProductCategory::all()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:150',
            'category_id' => 'required|integer|exists:product_categories,id',
            'weight'      => 'required|numeric|min:0|max:9999999.999',
        ]);

        $product = new Product();
        $product->name = $validated['name'];
        $product->category_id = $validated['category_id'];
        $product->weight = $validated['weight'];
        $product->save();

        return redirect('/product')->with('status', 'Товар добавлен.');
    }

    public function show(string $id)
    {
        return view('product', ['product' => Product::where('id', $id)->first()]);
    }

    public function edit(string $id)
    {
        return view('product_edit', [
            'product'    => Product::findOrFail($id),
            'categories' => ProductCategory::all(),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:150',
            'category_id' => 'required|integer|exists:product_categories,id',
            'weight'      => 'required|numeric|min:0|max:9999999.999',
        ]);

        $product = Product::findOrFail($id);
        $product->name = $validated['name'];
        $product->category_id = $validated['category_id'];
        $product->weight = $validated['weight'];
        $product->save();

        return redirect('/product')->with('status', 'Товар изменён.');
    }

    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        try {
            $product->delete();
        } catch (QueryException $e) {
            return redirect('/product')
                ->with('error', 'Нельзя удалить товар «' . $product->name . '»: он используется в накладных.');
        }

        return redirect('/product')->with('status', 'Товар удалён.');
    }
}
