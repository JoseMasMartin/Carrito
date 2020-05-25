<?php

namespace App\Http\Controllers;

use App\Product;
use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index(Request $r)
    {

        $products= Product::with(['provider'])->get();

        return view('products.index',['products'=> $products]);
    }
    public function create()
    {
        $providers= Provider::all();
        return view('products.create',['providers'=>$providers]);
    }
    public function store(Request $r)
    {
        $inputs = $r->all();
        $provider = Provider::find( $inputs['provider']);

        if($r->hasFile('foto'))
        {
            $inputs['foto']=$r->file('foto')->store('uploads','public'); //de lo que se
            //  nos envia, estamos modificando foto para recolectar la informacion que tiene, y lo
            //almacenamos en la carpeta uploads que esta en la parte publica
        }
        $product = new Product(['name'=> $inputs['name'],
            'cantidad'=> $inputs['cantidad'],
            'stock'=> $inputs['stock'],
            'type'=> $inputs['tipo'],
            'unit_price'=> $inputs['price'],
          'description'=> $inputs['description'],
            'city'=> $inputs['city'],
            'country'=> $inputs['country'],
               'foto'=> $inputs['foto']
        ]);
        $provider->products()->save($product);
    return redirect('/products');
    }
    public function edit($id)
    {
        $providers= Provider::all();
        $product = Product::find($id);
        return view('products.edit', ['product'=>$product,'providers'=>$providers]);
    }
    public function update($id, Request $r)
    {
        $inputs = $r->all();

        if($r->hasFile('foto'))
        {
            $product= Product::findOrFail($id);
            // Storage::delete('public/'.$producto->foto);
            Storage::disk('public')->delete($product->foto);
            $inputs['foto']=$r->file('foto')->store('uploads','public'); //de lo que se
            //  nos envia, estamos modificando foto para recolectar la informacion que tiene, y lo
            //almacenamos en la carpeta uploads que esta en la parte publica
        }
        $product = Product::find($id);
        $provider = Provider::find($inputs['provider']);
        $product-> provider()-> associate($provider);
        $product->update(['name'=> $inputs['name'],
            'cantidad'=> $inputs['cantidad'],
            'stock'=> $inputs['stock'],
            'type'=> $inputs['tipo'],
            'unit_price'=> $inputs['price'],
            'description'=> $inputs['description'],
            'city'=> $inputs['city'],
            'country'=> $inputs['country'],
            'foto'=> $inputs['foto']
        ]);
        return redirect('/products');
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        $producto= Product::findOrFail($id);
        if(Storage::disk('public')->delete($producto->foto)) {
            $product->delete();
        }
        return redirect('/products');

    }
    public function search(Request $request)
    {
//        $products = Product::all();
        $nombre = $request->get('buscador');
        $tipo = $request->get('tipo');
        $pais = $request->get('pais');
        $ciudad = $request->get('ciudad');

        $products= Product::nombres($nombre)->tipos($tipo)->paises($pais)->ciudades($ciudad)->paginate(5);

        return view('products.search',['products'=> $products]);
    }
    public function showCar(Request $r)
    {
       $res= $r->all();
       $products = null;
       if(isset($res['products']))
           $products = Product::whereIn('id',$res['products']);
       return view('products.car_shop',['products'=>$products]);
    }
}
