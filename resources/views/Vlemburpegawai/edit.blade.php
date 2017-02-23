@extends('layouts.app')

@section('content')
	<center><h2><label>Ubah Data Lembur Pegawai</label></h2></center><hr>
	<form method="POST" action="{{route('lembur-pegawai.update',$lpegawai->id)}}">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PATCH">

		<div class="form-group{{ $errors->has('kode_lembur_id') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Kategori Lembur</label>
			<div class="form-group col-md-8">
				<select name="kode_lembur_id" class="form-control" autofocus>
					<option value="">==Pilih Besaran Uang==</option>
                    @foreach($kategoril as $data)
                    <option value="{{$data->id}}">{{$data->besaran_uang}}</option>
                    @endforeach
                </select>
                @if ($errors->has('kode_lembur_id'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('kode_lembur_id') }}</strong>
	                </span>
	            @endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('pegawai_id') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Pegawai</label>
			<div class="form-group col-md-8">
				<select name="pegawai_id" class="form-control" autofocus>
					<option value="">==Pilih NIP==</option>
                    @foreach($pegawai as $data)
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

		<div class="form-group{{ $errors->has('jumlah_jam') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Jumlah Jam</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="jumlah_jam" autofocus>
				@if ($errors->has('jumlah_jam'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('jumlah_jam') }}</strong>
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