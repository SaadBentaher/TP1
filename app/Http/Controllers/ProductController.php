<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    public function index()
    {
        $product = Product::all();
        return view('product.index', compact('product'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Libelle' => 'required|string',
            'Marque' => 'required',
            'Prix' => 'required|numeric',
            'Stock' => 'required|integer|min:1|max:5000',
            'Image' => 'nullable|file',
        ]);
    }

    public function show(Product $product)
    {
        return view('product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    public function update(ProduitsStoreRequest $request,  $id)
    {
        $product = session('product',[]);
        foreach($product as $key => $produit){
             if($produit['Id']==$id){

        $produits[$key]=[
                     'Id'=>$id,
            'Libelle' => $request->libelle,
            'Marque' => $request->marque,
            'Prix' => $request->prix,
            'Stock' => $request->stock,
            'Image' => $request->file('image')->store('ProduitsImages','local'),
                 ];
             }
        }
    }

    public function destroy( $id)
    {
       $product = session('product', []);

        foreach ($product as $key => $produit) {
            if ($produit['Id'] == $id) {
                unset($product[$key]);
                break;
            }
        }
        

        session(['produits'=>$product]);
        return redirect('/product');
    }
}
