<?php

namespace App\Http\Controllers;

use /*Illuminate\Http\*/Request;
use App\Penggajian;
use App\TunjanganPegawai;
use App\Jabatan;
use App\Golongan;
use App\KategoriLembur;
use App\LemburPegawai;
use Validator;
use Input;

class PenggajianController extends Controller
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
        $penggajian=Penggajian::all();
        return view('Vpenggajian.index', compact('penggajian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tpegawai=TunjanganPegawai::all();
        return view('Vpenggajian.create', compact('tpegawai'));
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
        $table->integer('jumlah_jam_lembur');
            $table->integer('jumlah_uang_lembur');
            $table->integer('gaji_pokok');
            $table->integer('total_gaji');
            $table->date('tanggal_pengambilan');
            $table->string('status_pengambilan');
            $table->string('petugas_penerima');
        $rules=[
            'tunjangan_pegawai_id'=>'required',
            'pegawai_id'=>'required',
        ];
        $messages=[
            'tunjangan_pegawai_id.required'=>'Tunjangan Tidak Boleh Kosong',
            'pegawai_id.required'=>'NIP Tidak Boleh Kosong',
        ];
        $validasi=Validator::make(Input::all(),$rules,$messages);
        if ($validasi->fails()) {
            return redirect()->back()->WithErrors($validasi)->WithInput();
        }
        $penggajian=new Penggajian;
        $penggajian->tunjangan_pegawai_id=Request('tunjangan_pegawai_id');
        $penggajian->pegawai_id=Request('pegawai_id');
        $penggajian->save();

        return redirect('penggajian');
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
    }
}
