<?php

namespace App\Http\Controllers;

use /*Illuminate\Http\*/Request;
use App\TunjanganPegawai;
use App\Tunjangan;
use App\Pegawai;
use Validator;
use Input;

class TunjanganPegawaiController extends Controller
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
        $tpegawai=TunjanganPegawai::with('Tunjangan','Pegawai')->get();
        return view('Vtunjanganpegawai.index', compact('tpegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tunjangan=Tunjangan::all();
        $pegawai=Pegawai::all();
        return view('Vtunjanganpegawai.create', compact('tunjangan','pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //        
        $rules=[
            'kode_tunjangan_id'=>'required',
            'pegawai_id'=>'required',
        ];
        $messages=[
            'kode_tunjangan_id.required'=>'Tunjangan Tidak Boleh Kosong',
            'pegawai_id.required'=>'NIP Tidak Boleh Kosong',
        ];
        $validasi=Validator::make(Input::all(),$rules,$messages);
        if ($validasi->fails()) {
            return redirect()->back()->WithErrors($validasi)->WithInput();
        }
        $tpegawai=new TunjanganPegawai;
        $tpegawai->kode_tunjangan_id=Request('kode_tunjangan_id');
        $tpegawai->pegawai_id=Request('pegawai_id');
        $tpegawai->save();
        
        return redirect('tunjangan-pegawai');
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
        $tpegawai=TunjanganPegawai::find($id);
        $tunjangan=Tunjangan::all();
        $pegawai=Pegawai::all();
        return view('Vtunjanganpegawai.edit', compact('tpegawai','tunjangan','pegawai'));

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
        //
        $rules=[
            'kode_tunjangan_id'=>'required',
            'pegawai_id'=>'required',
        ];
        $messages=[
            'kode_tunjangan_id.required'=>'Tunjangan Tidak Boleh Kosong',
            'pegawai_id.required'=>'NIP Tidak Boleh Kosong',
        ];
        $validasi=Validator::make(Input::all(),$rules,$messages);
        if ($validasi->fails()) {
            return redirect()->back()->WithErrors($validasi)->WithInput();
        }
        $tpegawai=TunjanganPegawai::find($id);
        $tpegawai->kode_tunjangan_id=Request('kode_tunjangan_id');
        $tpegawai->pegawai_id=Request('pegawai_id');
        $tpegawai->update();

        return redirect('tunjangan-pegawai');
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
        $tpegawai=TunjanganPegawai::find($id)->delete();
        return redirect('tunjangan-pegawai');
    }
}
