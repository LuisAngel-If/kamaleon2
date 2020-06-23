<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class TestController extends Controller
{
    //
    public function welcome()
    {
        //compact crea una arreglo a partir de los parametros que le pasamos por ejemplo products
        // $products = Product::all();
        $products = Product::paginate(9);
        return view('welcome')->with(compact('products'));
        //arreglo asociativo
    }//php artisan tinker (consola) $products = App\Producy::all();
    //use App\Product;
    //Product::count(); (count saber numero de productos)
    //products = Product::where('technique_id' 1)->get();
}
