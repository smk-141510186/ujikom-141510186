<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;
use App\Jabatan;
use App\Golongan;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Input;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $pegawai=Pegawai::all();
        return view('Vpegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user=User::all();
        $jabatan=Jabatan::all();
        $golongan=Golongan::all();
        return view('Vpegawai.create',compact('user','jabatan','golongan'));
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
            'nip'=>'required|unique:pegawais',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'photo'=>'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'permission' => 'required',
            'password' => 'required|min:6|confirmed',
        ];
        $messages=[
            'nip.required'=>'NIP Tidak Boleh Kosong',
            'nip.unique'=>'NIP Tidak Boleh Sama',
            'jabatan_id.required'=>'Jabatan Tidak Boleh Kosong',
            'golongan_id.required'=>'Golongan Tidak Boleh Kosong',
            'photo.required'=>'Foto Harus Dipilih',
            'name.required'=>'Nama Tidak Boleh Kosong',
            'email.required'=>'E-Mail Tidak Boleh Kosong',
            'email.unique'=>'E-Mail Tidak Boleh Sama',
            'permission.required'=>'Permission Tidak Boleh Kosong',
            'password.required'=>'Password Tidak Boleh Kosong',
            'password.confirm'=>'Konfirmasi Password Dibutuhkan',
        ];
        $validasi=Validator::make(Input::all(),$rules,$messages);
        if ($validasi->fails()) {
            return redirect()->back()->WithErrors($validasi)->WithInput();
        }
        $user=new User;
        $user->name=Request('name');
        $user->email=Request('email');
        $user->permission=Request('permission');
        $user->password=bcrypt(Request('password'));
        $user->save();
        $user=User::all();
        foreach ($user as $data) {
            $id=$data->id;
        }

        $file=Input::file('photo');
        $destination=public_path().'/gambar ';
        $filename=$file->getClientOriginalName();
        $uploadsuccess=$file->move($destination,$filename);

        if(Input::hasFile('photo')){
            $pegawai= new Pegawai;
            $pegawai->nip=Request('nip');
            $pegawai->user_id=$id;
            $pegawai->jabatan_id=Request('jabatan_id');
            $pegawai->golongan_id=Request('golongan_id');
            $pegawai->photo=$filename;
            $pegawai->save();
        }
        return redirect('pegawai');
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
        $pegawai=Pegawai::find($id);
        $user=User::all();
        $jabatan=Jabatan::all();
        $golongan=Golongan::all();
        return view('Vpegawai.edit', compact('pegawai','user','jabatan','golongan'));
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
        $rules=[
            'nip'=>'required|unique:pegawais',
            'jabatan_id'=>'required',
            'golongan_id'=>'required',
            'photo'=>'required',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'permission' => 'required',
            'password' => 'required|min:6|confirmed',
        ];
        $messages=[
            'nip.required'=>'NIP Tidak Boleh Kosong',
            'nip.unique'=>'NIP Tidak Boleh Sama',
            'jabatan_id.required'=>'Jabatan Tidak Boleh Kosong',
            'golongan_id.required'=>'Golongan Tidak Boleh Kosong',
            'photo.required'=>'Foto Harus Dipilih',
            'name.required'=>'Nama Tidak Boleh Kosong',
            'email.required'=>'E-Mail Tidak Boleh Kosong',
            'email.unique'=>'E-Mail Tidak Boleh Sama',
            'permission.required'=>'Permission Tidak Boleh Kosong',
            'password.required'=>'Password Tidak Boleh Kosong',
            'password.confirmed'=>'Konfirmasi Password Dibutuhkan',
        ];
        $validasi=Validator::make(Input::all(),$rules,$messages);
        if ($validasi->fails()) {
            return redirect()->back()->WithErrors($validasi)->WithInput();
        }
        $file=Input::file('photo');
        $destination=public_path().'/gambar ';
        $filename=$file->getClientOriginalName();
        $uploadsuccess=$file->move($destination,$filename);

        if(Input::hasFile('photo')){
            $pegawai=Pegawai::find($id);
            $pegawai->nip=$request->get('nip');
            $pegawai->jabatan_id=$request->get('jabatan_id');
            $pegawai->golongan_id=$request->get('golongan_id');
            $pegawai->photo=$filename;
            $pegawai->update();
        }
        return redirect('pegawai');
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
        $pegawai = User::find($id)->delete();
        return redirect('pegawai');
    }
}
