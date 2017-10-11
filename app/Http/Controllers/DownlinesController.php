<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Downline;
use Session;

class DownlinesController extends Controller
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
        $downlines = Downline::where('markup', 'LIKE', '%'.$q.'%')->paginate(5);
        return view('downlines.index', compact('downlines', 'q'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('downlines.create');
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
            'nomor' => 'required',
            'markup' => 'required'
        ]);

        $downline = Downline::create($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",

        ]);

        return redirect()->route('downlines.index');
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
        $downline = Downline::findOrFail($id);
        return view('downlines.edit', compact('downline'));
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
        $downline = Downline::findOrFail($id);
        $this->validate($request, [
            'customer_id' => 'required',
            'nomor' => 'required',
            'markup' => 'required'
        ]);

        $downline->update($request->all());

        Session::flash("flash_notification", [
            "level"=>"success",
            "message"=>" $request->nomor , berhasil diubah."
        ]);

        return redirect()->route('downlines.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Downline::find($id)->delete();
        //if(!Category::destroy($id)) return redirect()->back();

        Session::flash("flash_notification", [
            "level"=>"danger",
            "message"=>"Downline telah dihapus."
        ]);

        return redirect()->route('downlines.index');
    }
}
