@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading"><b>Tunjangan</b></div>
		<div class="panel-body">
		<a class="btn btn-success" href="{{url('tunjangan/create')}}">
			<b>
				<span class="glyphicon glyphicon-plus-sign"></span>Tambah
			</b>
		</a>
		<br><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
				<tr class="bg-primary">
					<th>No</th>
					<th>Kode Tunjangan</th>
					<th>Jabatan</th>
					<th>Golongan</th>
					<th>Status</th>
					<th>Jumlah Anak</th>
					<th>Besaran Uang</th>
					<th colspan="2">Action</th>
				</tr>
				</thead>

				@php
				$no=1;
				@endphp
				<tbody>
					@foreach($tunjangan as $data)
					<tr>
						<td> {{$no++}} </td>
						<td> {{$data->kode_tunjangan}} </td>
						<td> {{$data->Jabatan->nama_jabatan}} </td>
						<td> {{$data->Golongan->nama_golongan}} </td>
						<td> {{$data->status}} </td>
						<td> {{$data->jumlah_anak}} </td>
						<td> Rp.{{$data->besaran_uang}} </td>
						<td>
							<a class="btn btn-info btn-sm" href="{{route('tunjangan.edit', $data->id)}}"><span class="glyphicon glyphicon-edit"></span>Ubah</a>
						</td>
						<td>
							<form method="POST" action="{{route('tunjangan.destroy', $data->id)}}">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit">
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