<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //view all food
    public function index()
    {
        $foods = Food::latest()->paginate(10);
        return view('food.showFood',compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('food.addFood');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'food_name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'category_name' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath,$name);

        Food::create([
            'food_name' =>$request->get('food_name'),
            'description' =>$request->get('description'),
            'price' =>$request->get('price'),
            'cat_id' =>$request->get('category_name'),
            'image' =>$name,
        ]);

        return redirect()->back()->with('message','Food Added successfully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $foods = Food::findOrFail($id);
       return view('food.editFood',compact('foods'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'food_name' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'category_name' => 'required',
            'image' => 'mimes:jpg,jpeg,png',
        ]);
        $foods = Food::findOrFail($id);
        $name = $foods->image;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath,$name);

        }
        $foods->update([
            'food_name' =>$request->get('food_name'),
            'description' =>$request->get('description'),
            'price' =>$request->get('price'),
            'cat_id' =>$request->get('category_name'),
            'image' =>$name,
        ]);

        return redirect()->route('food.index')->with('message','Food Update successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foods = Food::findOrFail($id);
        $foods->delete();
        return redirect()->back()->with('message','Food deleted successfully!!');
    }

    //listed food
    public function listfood()
    {
        $categories = Category::with('food')->get();

        return view('food.listedFood',compact('categories'));
    }

    //single details view of food
    public function viewFoodDetails($id)
    {
         $foods = Food::findOrFail($id);
         return view('food.singleDetailsFood',compact('foods'));
    }

}
