<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stock;
use Session;

class StocksController extends Controller
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
        $stocks = Stock::where('jumlah', 'LIKE', '%'.$q.'%')->paginate(20);
        return view('stocks.index', compact('stocks', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stocks.create');
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
            'supplier_id' => 'required|exists:suppliers,id',
            'product_id' => 'required|exists:products,id',
            'jumlah' => 'required|numeric',
            'tgl_beli' => 'required'
        ]);

        $stock = Stock::create($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>" $stock->jumlah , berhasil ditambahkan."
        ]);

        return redirect()->route('stocks.index');
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
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
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
        $customer = Customer::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'no_hp' => 'required'
        ]);

        $customer->update($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>" $request->name , berhasil diubah."
        ]);

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Stock::find($id)->delete();
        //if(!Supplier::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Stock telah dihapus."
        ]);

        return redirect()->route('stocks.index');
    }
}
