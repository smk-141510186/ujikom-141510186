<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;
use App\Http\Requests;
use App\Http\Requests\JabatanValidasi\StoreRequest;
use App\Http\Requests\JabatanValidasi\UpdateRequest;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
        $jabatan=Jabatan::all();
        return view('Vjabatan.index', compact('jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Vjabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        //
        $jabatan= new Jabatan();
        $jabatan->kode_jabatan=$request->kode_jabatan;
        $jabatan->nama_jabatan=$request->nama_jabatan;
        $jabatan->besaran_uang=$request->besaran_uang;
        $jabatan->save();

        return redirect()->route('jabatan.index')->with('alert-success','Data Berhasil Disimpan');
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
        //
        $jabatan=Jabatan::find($id);
        return view('Vjabatan.edit', compact('jabatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        //
        $jabatan= Jabatan::find($id);
        $jabatan->kode_jabatan=$request->kode_jabatan;
        $jabatan->nama_jabatan=$request->nama_jabatan;
        $jabatan->besaran_uang=$request->besaran_uang;
        $jabatan->save();

        return redirect()->route('jabatan.index')->with('alert-success','Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $jabatan=Jabatan::find($id)->delete();
        return redirect()->route('jabatan.index')->with('alert-success','Data Berhasil Dihapus');
    }
}
