@extends('layouts.app')

@section('content')
    <center><h2><label>Ubah Data Pegawai</label></h2></center><hr>
    <form method="POST" action="{{route('pegawai.update',$pegawai->id)}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PATCH">

        <div class="form-group{{ $errors->has('nip') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">NIP</label>
            <div class="col-md-8 form-group">
                <input type="text" name="nip" class="form-control" autofocus>
                @if ($errors->has('nip'))
                    <span class="help-block">
                        <strong>{{ $errors->first('nip') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Jabatan</label>
            <div class="col-md-8 form-group">
                <select name="jabatan_id" class="form-control" autofocus>
                    <option value="">==Pilih Jabatan==</option>
                    @foreach($jabatan as $data)
                    <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                    @endforeach
                </select>
                @if ($errors->has('jabatan_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('jabatan_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('golongan_id') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Golongan</label>
            <div class="col-md-8 form-group">
                <select name="golongan_id" class="form-control" autofocus>
                <option value="">==Pilih Golongan==</option>
                    @foreach($golongan as $data)
                    <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                    @endforeach
                </select>
                @if ($errors->has('golongan_id'))
                    <span class="help-block">
                        <strong>{{ $errors->first('golongan_id') }}</strong>
                    </span>
                @endif
            </div>
        </div>
            
        <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
            <label class="col-md-4 control-label">Pilih Foto</label>
            <div class="col-md-8 form-group">
                <input type="file" id="photo" name="photo">
                @if ($errors->has('photo'))
                    <span class="help-block">
                        <strong>{{ $errors->first('photo') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-8 col-md-offset-4">
                <input class="btn btn-success" type="submit" value="Simpan">
            </div>
        </div>
    </form>
@endsection