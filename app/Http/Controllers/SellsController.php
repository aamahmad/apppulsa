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
        $sells = Sell::where('harga_awal', 'LIKE', '%'.$q.'%')->orderBy('created_at', 'desc')->paginate(20);
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
            'customer_id',
            'product_id' => 'required',
            'harga_awal' => 'required|numeric',
            'harga_retail' => 'required|numeric',
            'qty' => 'required',
            'tgl' => 'required',
            'sub_total' => 'required',
            'isLunas',
            'ket1',
            'ket2'
        ]);

        $quantity = $request->get('qty');
        $modalproduk = $quantity *= $request->get('harga_awal');
        $subtotal = $request->get('sub_total');
        $keuntungan = $subtotal -= $modalproduk;

            $sell = Sell::firstOrCreate([
                'customer_id' => $request->get('customer_id'),
                'product_id' => $request->get('product_id'),
                'harga_awal' => $request->get('harga_awal'),
                'harga_retail' => $request->get('harga_retail'),
                'qty' => $request->get('qty'),
                'tgl' => $request->get('tgl'),
                'sub_total' => $request->get('sub_total'),
                'isLunas' => $request->get('isLunas'),
                'ket1'=> $request->get('ket1'),
                'ket2'=> $request->get('ket2'),
                'laba' => $keuntungan
            ]);
            $sell->save();

            Session::flash("flash_notification", [
                "level"=>"success",
                "message"=>" $sell->tgl , berhasil ditambahkan."
            ]);

            return redirect()->route('sells.index');


           // =====
/*
        $sell = Sell::create($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>" $sell->tgl , berhasil ditambahkan."
        ]);

        return redirect()->route('sells.index');
        */
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
        $sell = Sell::findOrFail($id);
        $prod=Category::where('induk_id','!=',0)->get();//get data from table
        return view('sells.edit', compact('sell','prod'));
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
        $sell = Sell::findOrFail($id);
        $this->validate($request, [
            'isLunas'
        ]);

        $sell->update($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Status Trx denga ID : $sell->id , berhasil diubah."
        ]);

        return redirect()->route('sells.index');
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

    public function status(Request $request)
    {
        $q = $request->get('q');
        $sells = Sell::where('isLunas', 'LIKE', '%'.$q.'%')->orderBy('created_at', 'desc')->paginate(20);
        return view('sells.index', compact('sells', 'q'));
    }
}
