@extends('layouts.app')

@section('content')
	<center><h2><label>Ubah Data Jabatan</label></h2></center><hr>
	<form method="POST" action="{{route('jabatan.update', $jabatan->id)}}">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PATCH">

		<div class="form-group{{ $errors->has('kode_jabatan') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Kode Jabatan</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="kode_jabatan" value="{{$jabatan->kode_jabatan}}">
				@if ($errors->has('kode_jabatan'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('kode_jabatan') }}</strong>
	                </span>
	            @endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('kode_jabatan') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Nama Jabatan</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="nama_jabatan" value="{{$jabatan->nama_jabatan}}">
				@if ($errors->has('nama_jabatan'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('nama_jabatan') }}</strong>
	                </span>
	            @endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('kode_jabatan') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Besaran Uang</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="besaran_uang" value="{{$jabatan->besaran_uang}}">
				@if ($errors->has('besaran_uang'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('besaran_uang') }}</strong>
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