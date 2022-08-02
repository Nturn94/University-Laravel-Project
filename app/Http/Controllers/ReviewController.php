<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Manufacturer;
use Auth;
use App\Models\Review;

class ReviewController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reviews.create')->with('products', Product::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'review' => 'required|max:255',
            'rating' => 'required|numeric|gte:0|lte:5'
            ]);
            
            $review = new Review();
    
            $review->review = $request->review;
            $review->rating = $request->rating;
            $review->user_id = Auth::user()->id;
            $review->product_id = $request->product_id; 
            $review->save();
            return redirect("product/$review->product_id");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $review = Review::find($id);
        // return view('products.show')->with('product', $product);
        return view('reviews.edit_form')->with('review', $review);
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
        // $this->validate($request, [
        //     'review' => 'required|max:255',
        //     'rating' => 'required|numeric|gte:0|lte:5'
        //     ]);


        // $request->validate( [
        //     'review' => 'required|max:255',
        //     'rating' => 'required|numeric|gte:0|lte:5'
        //     ]);


        
            $review = Review::find($id);

            if ($review){
                $this->validate($request, [
                    'review' => 'required|max:255|min:5',
                    'rating' => 'required|numeric|gte:0|lte:5'
                    ]);
                $review->review = $request->get('review');
                $review->rating = $request->get('rating');
                $review->product_id = $review->product_id;
                $review->user_id = $review->user_id;

                $review->save();
                return redirect('product');
   
            } 
            else{
                $this->validate($request, [
                    'review' => 'required|max:255|min:5',
                    'rating' => 'required|numeric|gte:0|lte:5'
                    ]);
                $review = new Review();
    
                $review->review = $request->review;
                $review->rating = $request->rating;
                $review->user_id = Auth::user()->id;
                $review->product_id = $request->product_id; 
                $review->save();
                return redirect("product");
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

        $review=Review::find($id);
        $productid = $review->product_id;
        $review->delete();
        return redirect("product/$productid");
        // return redirect('product');
    }
}
