@extends('layouts.app')

@section('content')
	<center><h2><label>Tambah Data Tunjangan Pegawai</label></h2></center><hr>
	<form method="POST" action="{{url('tunjangan-pegawai')}}">
		{{csrf_field()}}

		<div class="form-group">
			<label class="col-md-4 control-label">Tunjangan</label>
			<div class="form-group col-md-8">
				<select name="kode_tunjangan_id" class="form-control">
                    @foreach($tunjangan as $data)
                    <option value="{{$data->id}}">{{$data->besaran_uang}}</option>
                    @endforeach
                </select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">NIP</label>
			<div class="form-group col-md-8">
				<select name="pegawai_id" class="form-control">
                    @foreach($pegawai as $data)
                    <option value="{{$data->id}}">{{$data->nip}}</option>
                    @endforeach
                </select>
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-8 col-md-offset-4">
				<input class="btn btn-success" type="submit" value="Simpan">
			</div>
		</div>
	</form>
@endsection