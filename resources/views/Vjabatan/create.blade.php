@extends('layouts.app')

@section('content')
<div class="container">
	<center><h2><label>Tambah Data Jabatan</label></h2></center><hr>
	<form method="POST" action="{{route('jabatan.store')}}">
		{{csrf_field()}}

		<div class="form-group{{ $errors->has('kode_jabatan') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Kode Jabatan</label>
			<div class="form-group col-md-6">
				<input class="form-control" type="text" name="kode_jabatan" autofocus>
				@if ($errors->has('kode_jabatan'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('kode_jabatan') }}</strong>
	                </span>
	            @endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('nama_jabatan') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Nama Jabatan</label>
			<div class="form-group col-md-6">
				<input class="form-control" type="text" name="nama_jabatan" autofocus>
				@if ($errors->has('nama_jabatan'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('nama_jabatan') }}</strong>
	                </span>
	            @endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Besaran Uang</label>
			<div class="form-group col-md-6">
				<input class="form-control" type="text" name="besaran_uang" autofocus>
				@if ($errors->has('besaran_uang'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('besaran_uang') }}</strong>
	                </span>
	            @endif
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