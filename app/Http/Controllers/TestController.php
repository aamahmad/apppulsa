<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use App\Category;

class TestController extends Controller
{
    public function prodfunct()
    {
    	$prod=Category::all();//get data from table
        return view('productlist',compact('prod'));//sent data to view
    }

    public function findProductName(Request $request){

        //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        //$data=Product::where('category_id',$request->id)->take(100)->get();
        $data=Product::select('name','id')->where('category_id',$request->id)->get();
        return response()->json($data);//then sent this data to ajax success
    }

    public function findPrice(Request $request){

        //it will get price if its id match with product id
        $p=Product::where('id',$request->id)->first();
        //$p = Product::where('category_id', $request->id)->first();

        return response()->json($p);
    }


}
