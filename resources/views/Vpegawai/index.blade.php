@extends('layouts.app')

@section('content')
<div class="container">
	@if(Session::has('alert-success'))
	    <div class="alert alert-success">
	        {{ Session::get('alert-success') }}
	    </div>
	@endif
	<div class="panel panel-info">
		<div class="panel-heading"><b>Pegawai</b></div>
		<div class="panel-body">
		<a class="btn btn-success" href="{{url('pegawai/create')}}">
			<b>
				<span class="glyphicon glyphicon-plus-sign"></span>Tambah
			</b>
		</a>
		<br><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
				<tr class="bg-primary">
					<th>No</th>
					<th>NIP</th>
					<th>Email</th>
					<th>Type User</th>
					<th>Nama Jabatan</th>
					<th>Nama Golongan</th>
					<th>Photo</th>
					<th colspan="2">Action</th>
				</tr>
				</thead>

				@php
				$no=1;
				@endphp
				<tbody>
					@foreach($pegawai as $data)
					<tr>
						<td> {{$no++}} </td>
						<td> {{$data->nip}} </td>
						<td> {{$data->User->email}} </td>
						<td> {{$data->User->permission}} </td>
						<td> {{$data->Jabatan->nama_jabatan}} </td>
						<td> {{$data->Golongan->nama_golongan}} </td>
						<td><img src="gambar/{{$data->photo}}" height="90px" width="100px"></td>
						<td><a class="btn btn-info btn-sm" href="{{route('pegawai.edit', $data->id)}}"><span class="glyphicon glyphicon-edit"></span>Ubah</a></td>
						<td>
							<form method="POST" action="{{route('pegawai.destroy', $data->id)}}">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menghapus data ?');">
									<span class="glyphicon glyphicon-trash"></span>Hapus
								</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<b>*Note </b>: Sebelum mengisi data ini, mohon isi data jabatan dan golongan terlebih dahulu
		</div>
	</div>
</div>
@endsection