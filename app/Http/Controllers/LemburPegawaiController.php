<?php

namespace App\Http\Controllers;

use /*Illuminate\Http\*/Request;
use App\LemburPegawai;
use App\KategoriLembur;
use App\Pegawai;
use Validator;
use Input;

class LemburPegawaiController extends Controller
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
        $lpegawai=LemburPegawai::with('KategoriLembur','Pegawai')->get();
        return view('Vlemburpegawai.index',compact('lpegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kategoril=KategoriLembur::all();
        $pegawai=Pegawai::all();
        return view('Vlemburpegawai.create',compact('kategoril','pegawai'));
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
            'kode_lembur_id'=>'required',
            'pegawai_id'=>'required',
            'jumlah_jam'=>'required',
        ];
        $messages=[
            'kode_lembur_id.required'=>'Kategori Lembur Tidak Boleh Kosong',
            'pegawai_id.required'=>'NIP Tidak Boleh Kosong',
            'jumlah_jam.required'=>'Jumlah Jam Tidak Boleh Kosong',
        ];
        $validasi=Validator::make(Input::all(),$rules,$messages);
        if ($validasi->fails()) {
            return redirect()->back()->WithErrors($validasi)->WithInput();
        }
        $lpegawai=new LemburPegawai;
        $lpegawai->kode_lembur_id=Request('kode_lembur_id');
        $lpegawai->pegawai_id=Request('pegawai_id');
        $lpegawai->jumlah_jam=Request('jumlah_jam');
        $lpegawai->save();

        return redirect('lembur-pegawai');
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
        $lpegawai=LemburPegawai::find($id);
        $kategoril=KategoriLembur::all();
        $pegawai=Pegawai::all();
        return view('Vlemburpegawai.edit',compact('lpegawai','kategoril','pegawai'));
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
            'kode_lembur_id'=>'required',
            'pegawai_id'=>'required',
            'jumlah_jam'=>'required',
        ];
        $messages=[
            'kode_lembur_id.required'=>'Kategori Lembur Tidak Boleh Kosong',
            'pegawai_id.required'=>'NIP Tidak Boleh Kosong',
            'jumlah_jam.required'=>'Jumlah Jam Tidak Boleh Kosong',
        ];
        $validasi=Validator::make(Input::all(),$rules,$messages);
        if ($validasi->fails()) {
            return redirect()->back()->WithErrors($validasi)->WithInput();
        }
        $lpegawai=LemburPegawai::find($id);
        $lpegawai->kode_lembur_id=Request('kode_lembur_id');
        $lpegawai->pegawai_id=Request('pegawai_id');
        $lpegawai->jumlah_jam=Request('jumlah_jam');
        $lpegawai->update();
        
        return redirect('lembur-pegawai');
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
        $lpegawai=LemburPegawai::find($id)->delete();
        return redirect('lembur-pegawai');
    }
}
