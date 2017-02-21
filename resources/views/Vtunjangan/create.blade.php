@extends('layouts.app')

@section('content')
<div class="container">
	<center><h2><label>Tambah Data Tunjangan</label></h2></center><hr>
	<form method="POST" action="{{url('tunjangan')}}">
		{{csrf_field()}}

		<div class="form-group">
			<label class="col-md-4 control-label">Kode Tunjangan</label>
			<div class="form-group col-md-6">
				<input class="form-control" type="text" name="kode_tunjangan">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Jabatan</label>
			<div class="form-group col-md-6">
				<select name="jabatan_id" class="form-control">
                    @foreach($jabatan as $data)
                    <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                    @endforeach
                </select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Golongan</label>
			<div class="form-group col-md-6">
				<select name="golongan_id" class="form-control">
                    @foreach($golongan as $data)
                    <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                    @endforeach
                </select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Status</label>
			<div class="form-group col-md-6">
				<select name="status" class="form-control">
					<option value="Belum Menikah">Belum Menikah</option>
					<option value="Menikah">Menikah</option>
					<option value="Janda">Janda</option>
					<option value="Belum Duda">Belum Duda</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Jumlah Anak</label>
			<div class="form-group col-md-6">
				<input class="form-control" type="text" name="jumlah_anak">
			</div>
		</div>

		<div class="form-group">
			<label class="col-md-4 control-label">Besaran Uang</label>
			<div class="form-group col-md-6">
				<input class="form-control" type="text" name="besaran_uang">
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