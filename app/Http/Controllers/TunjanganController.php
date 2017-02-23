<?php

namespace App\Http\Controllers;

use /*Illuminate\Http\*/Request;
use App\Tunjangan;
use App\Jabatan;
use App\Golongan;
use Validator;
use Input;

class TunjanganController extends Controller
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
        $tunjangan=Tunjangan::with('Jabatan','Golongan')->get();
        return view('Vtunjangan.index', compact('tunjangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jabatan=Jabatan::all();
        $golongan=Golongan::all();
        return view('Vtunjangan.create', compact('jabatan','golongan'));
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
            'kode_tunjangan'=>'required|unique:kategori_lemburs',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'status'=>'required',
            'jumlah_anak'=>'required',
            'besaran_uang'=>'required',
        ];
        $messages=[
            'kode_tunjangan.required'=>'Kode Tunjangan Tidak Boleh Kosong',
            'kode_tunjangan.unique'=>'Kode Tunjangan Tidak Boleh Sama',
            'jabatan_id.required'=>'Jabatan Tidak Boleh Kosong',
            'golongan_id.required'=>'Golongan Tidak Boleh Kosong',
            'status.required'=>'Status Harus Diisi',
            'jumlah_anak.required'=>'Jumlah Anak Tidak Boleh Kosong',
            'besaran_uang.required'=>'Besaran Uang Tidak Boleh Kosong',
        ];
        $validasi=Validator::make(Input::all(),$rules,$messages);
        if ($validasi->fails()) {
            return redirect()->back()->WithErrors($validasi)->WithInput();
        }
        $tunjangan=new Tunjangan;
        $tunjangan->kode_tunjangan=Request('kode_tunjangan');
        $tunjangan->jabatan_id=Request('jabatan_id');
        $tunjangan->golongan_id=Request('golongan_id');
        $tunjangan->status=Request('status');
        $tunjangan->jumlah_anak=Request('jumlah_anak');
        $tunjangan->besaran_uang=Request('besaran_uang');
        $tunjangan->save();

        return redirect('tunjangan');
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
        $tunjangan=Tunjangan::find($id);
        $jabatan=Jabatan::all();
        $golongan=Golongan::all();
        return view('Vtunjangan.edit', compact('tunjangan','jabatan','golongan'));
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
            'kode_tunjangan'=>'required',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'status'=>'required',
            'jumlah_anak'=>'required',
            'besaran_uang'=>'required',
        ];
        $messages=[
            'kode_tunjangan.required'=>'Kode Tunjangan Tidak Boleh Kosong',
            'jabatan_id.required'=>'Jabatan Tidak Boleh Kosong',
            'golongan_id.required'=>'Golongan Tidak Boleh Kosong',
            'status.required'=>'Status Harus Diisi',
            'jumlah_anak.required'=>'Jumlah Anak Tidak Boleh Kosong',
            'besaran_uang.required'=>'Besaran Uang Tidak Boleh Kosong',
        ];
        $validasi=Validator::make(Input::all(),$rules,$messages);
        if ($validasi->fails()) {
            return redirect()->back()->WithErrors($validasi)->WithInput();
        }
        $tunjangan=Tunjangan::find($id);
        $tunjangan->kode_tunjangan=Request('kode_tunjangan');
        $tunjangan->jabatan_id=Request('jabatan_id');
        $tunjangan->golongan_id=Request('golongan_id');
        $tunjangan->status=Request('status');
        $tunjangan->jumlah_anak=Request('jumlah_anak');
        $tunjangan->besaran_uang=Request('besaran_uang');
        $tunjangan->update();

        return redirect('tunjangan');
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
        $tunjangan=Tunjangan::find($id)->delete();
        return redirect('tunjangan');
    }
}
