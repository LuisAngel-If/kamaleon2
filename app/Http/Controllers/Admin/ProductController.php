<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    //
    public function index(){
        $products = Product::paginate(10);
        return view('admin.products.index')->with(compact('products'));
    }

    public function create(){
        return view('admin.products.create');
    }

    public function store(Request $request){
        //dd($request->all());
        $messages = [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'Es necesario ingresar más de 5 carácteres en el nombre',
            'imagen.required' => 'Es necesario ingresar una imagen',
            'imagen.mimes' => 'Es necesario ingresar una imagen de tipo: jpeg, bmp, png',
            'descripcion.min' => 'Es necesario ingresar mínimo 10 carácteres en el campo descripción',
            'descripcion.required' => 'Es necesario ingresar una descripción',
            'fecha.required' => 'Es necesario ingresar una fecha',
            'estilo.min' => 'Es necesario ingresar mínimo 5 carácteres en el campo estilo',
            'estilo.required' => 'Es necesario ingresar un estilo',
            'dimensiones.min' => 'Es necesario ingresar mínimo 5 carácteres en las dimensiones',
            'dimensiones.required' => 'Es necesario ingresar las dimensiones',
            'precio.min' => 'Es necesario ingresar mínimo de 0 en el campo precio',
            'precio.required' => 'Es necesario ingresar un precio'
        ];
        
        $rules = [
            'name' => 'required|min:5',
            'imagen' => 'required|mimes:jpeg,bmp,png',
            'descripcion' => 'required|min:10', 
            'fecha' => 'required|min:3',
            'estilo' => 'required|min:5', 
            'dimensiones' => 'required|min:5',
            'precio' => 'required|numeric|min:0'
        ];

        $this->Validate($request, $rules, $messages);

        $file = $request->file('imagen');
        $path = public_path() . '/img/';
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->move($path, $fileName);
        // if($request->hasFile('imagen')){
        //     $file = $request->file('imagen');
        //     $name = time().$file->getClientOriginalName();
        //     $file->move(public_path().'/img/', $name);
        // }

        $product = new Product;
        $product->name = $request->input('name');
        $product->imagen = $fileName;
      
        $product->descripcion = $request->input('descripcion');
        $product->fecha = $request->input('fecha');    
        $product->dimensiones = $request->input('estilo'); 
        $product->estilo = $request->input('dimensiones');  
        $product->precio = $request->input('precio'); 

        $product->save();     
       // $products = Product::all();
        return redirect('/admin/products');
    }

    public function getUrlAtributte(){

        if (substr($this->imagen, 0, 4) === "http"){
            return $this->imagen;
        }
        return '/img/' . $this->imagen;
    }

    public function edit($id){
      //  return "formulario de edicion con id $id";
        $product = Product::find($id);
        return view('admin.products.edit')->with(compact('product'));
    
    }

    public function update(Request $request, $id){
        //dd($request->all());

        $messages = [
            'name.required' => 'Es necesario ingresar un nombre',
            'name.min' => 'Es necesario ingresar más de 5 carácteres en el nombre',
            'imagen.required' => 'Es necesario ingresar una imagen',
            'imagen.mimes' => 'Es necesario ingresar una imagen de tipo: jpeg, bmp, png',
            'descripcion.min' => 'Es necesario ingresar mínimo 10 carácteres en el campo descripción',
            'descripcion.required' => 'Es necesario ingresar una descripción',
            'fecha.required' => 'Es necesario ingresar una fecha',
            'estilo.min' => 'Es necesario ingresar mínimo 5 carácteres en el campo estilo',
            'estilo.required' => 'Es necesario ingresar un estilo',
            'dimensiones.min' => 'Es necesario ingresar mínimo 5 carácteres en el campo dimensiones',
            'dimensiones.required' => 'Es necesario ingresar las dimensiones',
            'precio.min' => 'Es necesario ingresar mínimo de 0 en el campo precio',
            'precio.required' => 'Es necesario ingresar un precio'
        ];
        
        $rules = [
            'name' => 'required|min:5',
            'imagen' => 'required|mimes:jpeg,bmp,png',
            'descripcion' => 'required|min:10', 
            'fecha' => 'required|min:3',
            'estilo' => 'required|min:5', 
            'dimensiones' => 'required|min:5',
            'precio' => 'required|numeric|min:0'
        ];

        $this->Validate($request, $rules, $messages);

        $file = $request->file('imagen');
        $path = public_path() . '/img';
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->move($path, $fileName);

        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->imagen = $file;
        $product->descripcion = $request->input('descripcion');
        $product->fecha = $request->input('fecha');    
        $product->dimensiones = $request->input('estilo'); 
        $product->estilo = $request->input('dimensiones');  
        $product->precio = $request->input('precio'); 
        $product->save();   


        return redirect('/admin/products');
    }

    public function destroy($id){
        //dd($request->all());

        $product = Product::find($id);
        $product->delete();   
          

        return back();
    }
}
