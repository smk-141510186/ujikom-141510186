@extends('layouts.app')

@section('content')
	<center><h2><label>Tambah Data Lembur Pegawai</label></h2></center><hr>
	<form method="POST" action="{{url('lembur-pegawai')}}">
		{{csrf_field()}}

		<div class="form-group">
			<label class="col-md-4 control-label">Kategori Lembur</label>
			<div class="form-group col-md-8">
				<select name="kode_lembur_id" class="form-control">
                    @foreach($kategoril as $data)
                    <option value="{{$data->id}}">{{$data->besaran_uang}}</option>
                    @endforeach
                </select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Pegawai</label>
			<div class="form-group col-md-8">
				<select name="pegawai_id" class="form-control">
                    @foreach($pegawai as $data)
                    <option value="{{$data->id}}">{{$data->nip}}</option>
                    @endforeach
                </select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Jumlah Jam</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="jumlah_jam">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-8 col-md-offset-4">
				<input class="btn btn-success" type="submit" value="Simpan">
			</div>
		</div>
	</form>
@endsection