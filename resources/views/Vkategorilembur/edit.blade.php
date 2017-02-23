@extends('layouts.app')

@section('content')
	<center><h2><label>Ubah Data Kategori Lembur</label></h2></center><hr>
	<form method="POST" action="{{route('lembur-kategori.update',$kategoril->id)}}">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PATCH">

		<div class="form-group{{ $errors->has('kode_lembur') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Kode Lembur</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="kode_lembur" value="{{$kategoril->kode_lembur}}" autofocus>
				@if ($errors->has('kode_lembur'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('kode_lembur') }}</strong>
	                </span>
	            @endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Jabatan</label>
			<div class="form-group col-md-8">
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
			<div class="form-group col-md-8">
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

		<div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Besaran Uang</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="besaran_uang" value="{{$kategoril->besaran_uang}}" autofocus>
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