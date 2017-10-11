<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Deposit;
use Session;

class DepositsController extends Controller
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
        $deposits = Deposit::where('jumlah', 'LIKE', '%'.$q.'%')->orderBy('created_at', 'desc')->paginate(5);
        return view('deposits.index', compact('deposits', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deposits.create');
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
            'category_id' => 'required|exists:categories,id',
            'jumlah' => 'required|numeric',
            'tgl_beli' => 'required'
        ]);

        $deposit = Deposit::create($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>" $deposit->jumlah , berhasil ditambahkan."
        ]);

        return redirect()->route('deposits.index');
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
        $deposit = Deposit::findOrFail($id);
        return view('deposits.edit', compact('deposit'));
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
        Deposit::find($id)->delete();
        //if(!Supplier::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Deposit telah dihapus."
        ]);

        return redirect()->route('deposits.index');
    }
}
