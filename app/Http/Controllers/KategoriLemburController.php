<?php

namespace App\Http\Controllers;

use /*Illuminate\Http\*/Request;
use App\KategoriLembur;
use App\Jabatan;
use App\Golongan;
use Validator;
use Input;

class KategoriLemburController extends Controller
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
        $kategoril=KategoriLembur::with('Jabatan','Golongan')->get();
        return view('Vkategorilembur.index', compact('kategoril'));
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
        return view('Vkategorilembur.create',compact('jabatan','golongan'));
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
            'kode_lembur'=>'required|unique:kategori_lemburs',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'besaran_uang'=>'required',
        ];
        $messages=[
            'kode_lembur.required'=>'Kode Lembur Tidak Boleh Kosong',
            'kode_lembur.unique'=>'Kode Lembur Tidak Boleh Sama',
            'jabatan_id.required'=>'Jabatan Tidak Boleh Kosong',
            'golongan_id.required'=>'Golongan Tidak Boleh Kosong',
            'besaran_uang.required'=>'Besaran Uang Tidak Boleh Kosong',
        ];
        $validasi=Validator::make(Input::all(),$rules,$messages);
        if ($validasi->fails()) {
            return redirect()->back()->WithErrors($validasi)->WithInput();
        }
        $user=new KategoriLembur;
        $user->kode_lembur=Request('kode_lembur');
        $user->jabatan_id=Request('jabatan_id');
        $user->golongan_id=Request('golongan_id');
        $user->besaran_uang=Request('besaran_uang');
        $user->save();

        return redirect('lembur-kategori');
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
        $kategoril=KategoriLembur::find($id);
        $jabatan=Jabatan::all();
        $golongan=Golongan::all();
        return view('Vkategorilembur.edit',compact('kategoril','jabatan','golongan'));
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
        $kategoril=Request::all();
        $kategorilUpdate=KategoriLembur::find($id);
        $kategorilUpdate->update($kategoril);
        return redirect('lembur-kategori');
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
        $kategoril=KategoriLembur::find($id)->delete();
        return redirect('lembur-kategori');
    }
}
