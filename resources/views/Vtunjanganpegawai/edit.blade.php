@extends('layouts.app')

@section('content')
	<center><h2><label>Ubah Data Tunjangan Pegawai</label></h2></center><hr>
	<form method="POST" action="{{route('tunjangan-pegawai.update',$tpegawai->id)}}">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PATCH">

		<div class="form-group{{ $errors->has('kode_tunjangan_id') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Tunjangan</label>
			<div class="form-group col-md-8">
				<select name="kode_tunjangan_id" class="form-control">
					<option value="">==Pilih Tunjangan==</option>
                    @foreach($tunjangan as $data)
                    <option value="{{$data->id}}">{{$data->besaran_uang}}</option>
                    @endforeach
                </select>
                @if ($errors->has('kode_tunjangan_id'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('kode_tunjangan_id') }}</strong>
	                </span>
	            @endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">NIP</label>
			<div class="form-group col-md-8">
				<select name="pegawai_id" class="form-control">
                    @foreach($pegawai as $data)
                    <option value="">==Pilih NIP==</option>
                    <option value="{{$data->id}}">{{$data->nip}}</option>
                    @endforeach
                </select>
                @if ($errors->has('pegawai_id'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('pegawai_id') }}</strong>
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