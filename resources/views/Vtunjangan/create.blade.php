@extends('layouts.app')

@section('content')
	<center><h2><label>Tambah Data Tunjangan</label></h2></center><hr>
	<form method="POST" action="{{url('tunjangan')}}">
		{{csrf_field()}}

		<div class="form-group{{ $errors->has('kode_tunjangan') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Kode Tunjangan</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="kode_tunjangan">
				@if ($errors->has('kode_tunjangan'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('kode_tunjangan') }}</strong>
	                </span>
	            @endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('jabatan_id') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Jabatan</label>
			<div class="form-group col-md-8">
				<select name="jabatan_id" class="form-control">
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
				<select name="golongan_id" class="form-control">
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

		<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Status</label>
			<div class="form-group col-md-8">
				<select name="status" class="form-control">
					<option value="">==Pilih Status==</option>
					<option value="Belum Menikah">Belum Menikah</option>
					<option value="Menikah">Menikah</option>
					<option value="Janda">Janda</option>
					<option value="Duda">Duda</option>
				</select>
				@if ($errors->has('status'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('status') }}</strong>
	                </span>
	            @endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('jumlah_anak') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Jumlah Anak</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="jumlah_anak">
				@if ($errors->has('jumlah_anak'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('jumlah_anak') }}</strong>
	                </span>
	            @endif
			</div>
		</div>

		<div class="form-group{{ $errors->has('besaran_uang') ? ' has-error' : '' }}">
			<label class="col-md-4 control-label">Besaran Uang</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="besaran_uang">
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
</div>
@endsection