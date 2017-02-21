<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Golongan;
use App\Http\Requests;
use App\Http\Requests\GolonganValidasi\StoreRequest;
use App\Http\Requests\GolonganValidasi\UpdateRequest;

class GolonganController extends Controller
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
        $golongan=Golongan::all();
        return view('Vgolongan.index', compact('golongan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Vgolongan.create');
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
        $golongan=new Golongan();
        $golongan->kode_golongan=$request->kode_golongan;
        $golongan->nama_golongan=$request->nama_golongan;
        $golongan->besaran_uang=$request->besaran_uang;
        $golongan->save();
        return redirect()->route('golongan.index')->with('alert-success','Data berhasil disimpan');
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
        $golongan=Golongan::find($id);
        return view('Vgolongan.edit', compact('golongan'));
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
        $golongan=Golongan::find($id);
        $golongan->kode_golongan=$request->kode_golongan;
        $golongan->nama_golongan=$request->nama_golongan;
        $golongan->besaran_uang=$request->besaran_uang;
        $golongan->save();
        return redirect()->route('golongan.index')->with('alert-success','Data berhasil diubah');
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
        $golongan=Golongan::find($id)->delete();
        return redirect('golongan');
    }
}
