<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufacturer;
use Auth;
use App\Models\Review;
use DB;

class ProductController extends Controller
{
    
    function __construct(){

        $this->middleware('auth', ['except'=>[ 'index', 'show']]);
        // $this->middleware('admin', ['except'=>['edit', 'destroy']]);
        
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|numeric|gte:0',
            'manufacturer' =>'required|max:255',
            'description' => 'required|max:255',
            'url' => 'url'
            ]);
        
        $product = new Product();

        $product->name = $request->name;
        $product->price = $request->price;
        $product->manufacturer = $request->manufacturer;
        $product->description = $request->description;
        $product->url = $request->url;
        $product->save();
        return redirect("product/$product->id");
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $review = Review::where('id', $product->id);

        $review = DB::table('reviews')->where('reviews.product_id', '=', $id)->get();


        // dd($review);
        // $review = Review::all();
        return view('products.show')->with('product', $product)->with('reviews', $review);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->rank == "moderator"){
            $product = Product::find($id);
            // return view('products.show')->with('product', $product);
            return view('products.edit_form')->with('product', $product);
        }else{
            return redirect('product');
        }
        
        // $product->save();

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

        $this->validate($request, [
            'name' => 'required|max:255',
            'price' => 'required|numeric|gte:0',
            'manufacturer' =>'required|max:255',
            'description' => 'required|max:255',
            'url' => 'url'
            ]);



        
            $product = Product::find($id);

            if ($product){
                // $product->name = $request->name;
                // $product->price = $request->price;
                $product->name = $request->get('name');
                $product->price = $request->get('price');
                $product->manufacturer = $request->manufacturer;
                $product->description = $request->description;
                $product->url = $request->url;

                $product->save();
                return redirect('product/$product->id');
            }
            else{
                $product = new Product();

                $product->name = $request->name;
                $product->price = $request->price;
                $product->manufacturer = $request->manufacturer;
                $product->description = $request->description;
                $product->url = $request->url;
                $product->save();
                return redirect("product/$product->id");
            }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

            $product=Product::find($id);
            // $product->manufacturer_id->delete();
            $product->delete();
            return redirect('product');
        // $products = Product::all();
        // return view('products.index')->with('products', $products);
    }
}
