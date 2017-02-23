@extends('layouts.app')
@section('content')
	<form method="POST" action="{{url('pegawai')}}" enctype="multipart/form-data">
	{{csrf_field()}}
    <center><h2><label>Registrasi Pegawai</label></h2></center><hr>
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

    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-md-4 control-label">Nama</label>

        <div class="col-md-8 form-group">
            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" autofocus>

            @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
        <label for="email" class="col-md-4 control-label">Alamat E-Mail</label>

        <div class="col-md-8 form-group">
            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>

            @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('permission') ? ' has-error' : '' }}">
        <label class="col-md-4 control-label">Permission</label>
        <div class="col-md-8 form-group">
            <input class="form-control" id="permission" type="text" name="permission" autofocus>

            @if ($errors->has('permission'))
                <span class="help-block">
                    <strong>{{ $errors->first('permission') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <label for="password" class="col-md-4 control-label">Kata Sandi</label>

        <div class="col-md-8 form-group">
            <input id="password" type="password" class="form-control" name="password" autofocus>

            @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-md-4 control-label">Konfirmasi Kata Sandi</label>

        <div class="col-md-8 form-group">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autofocus>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-primary">
                Register
            </button>
        </div>
    </div>
    </form>
@endsection