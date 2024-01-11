<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProduitsStoreRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class ProductController extends Controller
{
  
    public function index()
    {   
        $produits = session('produits',[]); 
        return view('produits.index',['produits'=>$produits]);
    }

    public function create()
    {
 
        return view('produits.create');
    }

    public function store(ProduitsStoreRequest $request)
    {
        $produits = session('produits',[]);
        array_push($produits,[
            'Id'=>uniqid(),
            'Libelle' => $request->libelle,
            'Marque' => $request->marque,
            'Prix' => $request->prix,
            'Stock' => $request->stock,
            'Image' => $request->file('image')->store('ProduitsImages','local'),
        ]);
        session(['produits' => $produits]);
        
        return redirect('/produits');
    }

    public function show( $id)
    {
        $produits=session('produits',[]);
        foreach($produits as $produit){
             if($produit['Id']==$id){
                $infoproduit=$produit;
                return view("produits.show",['id'=>$id,'produit'=>$infoproduit]);
             }
             
            }
            return view('produits.error');
    }

    public function edit(string $id)
    {
        $produits = session('produits',[]); 
        return view('produits.edit',compact('produits','id'));
    }

    public function update(ProduitsStoreRequest $request,  $id)
    {
        $produits = session('produits',[]);
        foreach($produits as $key => $produit){
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
        session(['produits' => $produits]);
        return redirect('/produits');
    }

    public function destroy( $id)
    {
       $produits = session('produits', []);

        foreach ($produits as $key => $produit) {
            if ($produit['Id'] == $id) {
                unset($produits[$key]);
                break;
            }
        }
        

        session(['produits'=>$produits]);
        return redirect('/produits');
    }
}
