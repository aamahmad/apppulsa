<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Supplier;
use Session;

class SuppliersController extends Controller
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
        $suppliers = Supplier::where('name', 'LIKE', '%'.$q.'%')->orderBy('created_at', 'desc')->paginate(20);
        return view('suppliers.index', compact('suppliers', 'q'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('suppliers.create');
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
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ]);

        $supplier = Supplier::create($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>" $supplier->name , berhasil ditambahkan."
        ]);

        return redirect()->route('suppliers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $supplier = Supplier::findOrFail($id);
        return view('suppliers.edit', compact('supplier'));
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
        $suppliers = Supplier::findOrFail($id);
        $this->validate($request, [
            'name' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
            'email' => 'required'
        ]);

        $suppliers->update($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>" $request->name , berhasil diubah."
        ]);

        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Supplier::find($id)->delete();

        if(!Supplier::destroy($id)) return redirect()->back();


        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>"Sales/Ditributir telah dihapus."
        ]);

        return redirect()->route('suppliers.index');
    }
}
