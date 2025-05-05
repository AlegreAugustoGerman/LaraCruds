<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{



/*     public function index()
    {
        $products= Products::paginate(10); // Use pagination for large datasets
        return view('Products.index', compact('products'));
    }

    public function show(int $id)
    {
        $product = Products::findOrFail($id);
        return view('Products.show', compact('products'));
    }


    public function create()
    {
        return view('Products.create');
    }




    public function store($request)
    {
        $validatedData = $request->validated();

        $product = new Products;
        $product->fill($validatedData);

        if ($request->hasFile('imagen')) {
            $fileName = uniqid() . '.' . $request->imagen->getClientOriginalExtension();
            $request->imagen->storeAs('public/products', $fileName); // Store in public/products
            $product->imagen = $fileName;
        }

        $product->save();

        return redirect()->route('Products.index')->with('success', 'Producto creado con éxito.');
    }

    public function edit(int $id)
    {
        $product = Products::findOrFail($id);
        return view('Products.edit', compact('product'));
    }

    public function update($request, int $id) // Use the validation request
    {
        $validatedData = $request->validated();

        $product = Products::findOrFail($id);
        $product->fill($validatedData);



        $product->save();

        return redirect()->route('Products.index')->with('success', 'Producto actualizado con éxito.');
    }

    public function destroy(int $id)
    {
        $product = Products::findOrFail($id);

        $product->delete();

        return redirect()->route('Products.index')->with('success', 'Producto eliminado con éxito.');
    }
} */
public function home()
    {   $products = Products::all();
        return view('welcome', compact('products'));
    }


public function index()
{
    $products = Products::all();
    return view('products.index', compact('products'));
}

/**
 * Show the form for creating a new product.
 */
public function create()
{
    return view('products.create');
}

/**
 * Store a newly created product in storage.
 */
public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'nullable|numeric|between:0,9999999999999.99',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|max:2048', // Ejemplo de validación para la imagen
    ]);

    $productData = $request->except('imagen');

    if ($request->hasFile('imagen')) {
        $imagePath = $request->file('imagen')->store('products', 'public');
        $productData['imagen'] = $imagePath;
    }

    Products::create($productData);

    return redirect()->route('products.index')->with('success', 'Producto creado exitosamente.');
}

/**
 * Display the specified product.
 */
/* public function show(int $id)
{
    $product = Products::findOrFail($id);
    return view('products.show', compact('product'));
} */

/**
 * Show the form for editing the specified product.
 */
public function edit(Products $product)
{
    return view('products.edit', compact('product'));
}

/**
 * Update the specified product in storage.
 */
public function update(Request $request, Products $product)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'precio' => 'nullable|numeric|between:0,9999999999999.99',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|max:2048', // Ejemplo de validación para la imagen
    ]);

    $productData = $request->except('imagen');

    if ($request->hasFile('imagen')) {
        // Eliminar la imagen anterior si existe
        if ($product->imagen) {
            Storage::disk('public')->delete($product->imagen);
        }
        $imagePath = $request->file('imagen')->store('products', 'public');
        $productData['imagen'] = $imagePath;
    }

    $product->update($productData);

    return redirect()->route('products.index')->with('success', 'Producto actualizado exitosamente.');
}

/**
 * Remove the specified product from storage.
 */
  public function destroy(int $id)
{
    $product = Products::findOrFail($id);

    if ($product->imagen) {
        Storage::disk('public')->delete($product->imagen);
    }

    $product->delete();

    return redirect()->route('products.index')->with('success', 'Producto eliminado con éxito.');
}


public function search(Request $request)
    {
        $searchTerm = $request->input('search');

        $products = Products::query()
            ->where('nombre', 'like', '%' . $searchTerm . '%')
            ->orWhere('descripcion', 'like', '%' . $searchTerm . '%')
            ->get();

        return view('welcome', compact('products')); // O la vista donde deseas mostrar los resultados
    }


}



