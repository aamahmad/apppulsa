<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;
use Session;

class ProductsController extends Controller
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
        $products = Product::where('name', 'LIKE', '%'.$q.'%')->orderBy('created_at', 'desc')->paginate(20);
        return view('products.index', compact('products', 'q'));
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:products,name',
            'harga_dasar' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'jenis' => 'required'
        ]);

        $product = Product::create($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>" $product->name , berhasil ditambahkan."
        ]);

        return redirect()->route('products.index');
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
        return view('products.edit', compact('product'));
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
            'name' => 'required|unique:products,name,'. $id,
            'harga_dasar' => 'required|numeric',
            'harga_jual' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'jenis' => 'required'
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
        //Product::find($id)->delete();
        if(!Product::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Produk telah dihapus."
        ]);

        return redirect()->route('products.index');
    }
}
