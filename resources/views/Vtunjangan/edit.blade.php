@extends('layouts.app')

@section('content')
	<center><h2><label>Ubah Data Tunjangan</label></h2></center><hr>
	<form method="POST" action="{{route('tunjangan.update', $tunjangan->id)}}">
		{{csrf_field()}}
		<input type="hidden" name="_method" value="PATCH">

		<div class="form-group">
			<label class="col-md-4 control-label">Kode Tunjangan</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="kode_tunjangan" value="{{$tunjangan->kode_tunjangan}}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Jabatan</label>
			<div class="form-group col-md-8">
				<select name="jabatan_id" class="form-control">
                    @foreach($jabatan as $data)
                    <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                    @endforeach
                </select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Golongan</label>
			<div class="form-group col-md-8">
				<select name="golongan_id" class="form-control">
                    @foreach($golongan as $data)
                    <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                    @endforeach
                </select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Status</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="status" value="{{$tunjangan->status}}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Jumlah Anak</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="jumlah_anak" value="{{$tunjangan->jumlah_anak}}">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Besaran Uang</label>
			<div class="form-group col-md-8">
				<input class="form-control" type="text" name="besaran_uang" value="{{$tunjangan->besaran_uang}}">
			</div>
		</div>

		<div class="form-group">
			<div class="col-md-8 col-md-offset-4">
				<input class="btn btn-success" type="submit" value="Simpan">
			</div>
		</div>
	</form>
@endsection