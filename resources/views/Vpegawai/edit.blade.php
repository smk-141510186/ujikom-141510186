@extends('layouts.app')

@section('content')
<div class="container">
    <center><h2><label>Ubah Data Pegawai</label></h2></center><hr>
    <form method="POST" action="{{route('pegawai.update',$pegawai->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">

        <div class="form-group">
            <label class="col-md-4 control-label">NIP</label>
            <div class="form-group col-md-6">
                <input class="form-control" type="text" name="nip" value="{{$pegawai->nip}}">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Jabatan</label>
            <div class="form-group col-md-6">
                <select name="jabatan_id" class="form-control">
                    @foreach($jabatan as $data)
                    <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Golongan</label>
            <div class="form-group col-md-6">
                <select name="golongan_id" class="form-control">
                    @foreach($golongan as $data)
                    <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Pilih Foto</label>
            <div class="form-group col-md-6">
                <input type="file" name="photo" id="photo">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-6 col-md-offset-4">
                <input class="btn btn-success" type="submit" value="Simpan">
            </div>
        </div>
    </form>
</div>
@endsection