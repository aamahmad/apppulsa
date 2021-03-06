<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Downline;
use App\Nomor;
use App\Product;
use App\Sell;
use Session;

class CustomersController extends Controller
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
        $customers = Customer::where('name', 'LIKE', '%'.$q.'%')->orderBy('created_at', 'desc')->paginate(20);
        return view('customers.index', compact('customers', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'name' => 'required',
            'alamat' => 'required'
        ]);

        $customer = Customer::create($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>" $customer->name , berhasil ditambahkan."
        ]);

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = \App\Customer::findOrFail($id);
        //$datanomor = \App\Nomor::findOrFail($id);
        $datanomor = Nomor::where('customer_id', $customer->id)->get();
        $trxpelanggans = Sell::where('customer_id', $customer->id)->orderBy('created_at', 'desc')->get();

        return view('customers.show', compact('customer','datanomor','trxpelanggans'));
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
            'alamat' => 'required'
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
        if(!Customer::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Pelanggan telah dihapus."
        ]);

        return redirect()->route('customers.index');
    }
}
