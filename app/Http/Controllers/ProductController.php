<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;

use function PHPUnit\Framework\returnSelf;

class ProductController extends Controller
{
    //funtion in controller
    public function index(){

        // get all avalable product to display all
        $products =product::all();


        // need t pass database data to index page ['products' =>$products]
        return view('products.index',['products' =>$products]);

        // in now view can gaet data from controller

    }

    public function create()  {
        
        return view('products.create');
    }


    public function store(Request $request) {
        //dd($request->name);

        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description'=>'required|string',


        ]);

        $newproduct = product::create($data);
        
        return redirect(route('product.index'));



    }

    public function edit(product $product){

        return view('products.edit',['product'=>$product]);

    }


    public function update( product $product,Request $request) {

        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description'=>'required|string',


        ]);

        $product ->update($data);

        //then update is completed need to redirect to index page/home page
        return redirect(route('product.index'))->with('success','product updated successffuly');
    }
        


    public function delete(product $product)  {
        //delete funtion need to call over here
        $product->delete();

        //if successfully dleted data need to redirect to index page
        return redirect(route('product.index'))->with('success','product Delete successffuly');
    }
    
}
