<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sell;
use App\Category;
use App\Product;
use Session;

class SellsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->get('q');
        $sells = Sell::where('harga_awal', 'LIKE', '%'.$q.'%')->paginate(20);
        return view('sells.index', compact('sells', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prod=Category::where('induk_id','!=',0)->get();//get data from table
        //return view('sells.create');
        return view('sells.create',compact('prod'));//sent data to view
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
            'customer_id' => 'required',
            'product_id' => 'required',
            'harga_awal' => 'required|numeric',
            'harga_retail' => 'required|numeric',
            'qty' => 'required',
            'tgl' => 'required',
            'sub_total' => 'required'
        ]);

        $sell = Sell::create($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>" $sell->tgl , berhasil ditambahkan."
        ]);

        return redirect()->route('sells.index');
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
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('customer'));
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
        $product = Product::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'no_hp' => 'required'
        ]);

        $product->update($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>" $request->name , berhasil diubah."
        ]);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sell::find($id)->delete();
        //if(!Sell::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Data Transaksi Penjualan telah dihapus."
        ]);

        return redirect()->route('sells.index');
    }


    public function findProduct(Request $request){

        //if our chosen id and products table prod_cat_id col match the get first 100 data 

        //$request->id here is the id of our chosen option id
        //$data=Product::where('category_id',$request->id)->take(100)->get();
        $data=Product::select('name','id')->where('category_id',$request->id)->get();
        return response()->json($data);//then sent this data to ajax success
    }

    public function findHarga(Request $request){

        //it will get price if its id match with product id
        $p=Product::where('id',$request->id)->first();
        //$p = Product::where('category_id', $request->id)->first();

        return response()->json($p);
    }
}
