@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-info">
		<div class="panel-heading"><b>Tunjangan Pegawai</b></div>
		<div class="panel-body">
		<a class="btn btn-success" href="{{url('tunjangan-pegawai/create')}}">
			<b>
				<span class="glyphicon glyphicon-plus-sign"></span>Tambah
			</b>
		</a>
		<br><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
				<tr class="bg-primary">
					<th>No</th>
					<th>Tunjangan</th>
					<th>NIP</th>
					<th colspan="2">Action</th>
				</tr>
				</thead>

				@php
				$no=1;
				@endphp
				<tbody>
					@foreach($tpegawai as $data)
					<tr>
						<td> {{$no++}} </td>
						<td> Rp.{{$data->Tunjangan->besaran_uang}} </td>
						<td> {{$data->Pegawai->nip}} </td>
						<td>
							<a class="btn btn-info btn-sm" href="{{route('tunjangan-pegawai.edit', $data->id)}}"><span class="glyphicon glyphicon-edit"></span>Ubah</a>
						</td>
						<td>
							<form method="POST" action="{{route('tunjangan-pegawai.destroy', $data->id)}}">
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
			<b>*Note </b>: Sebelum mengisi data ini, mohon isi data tunjangan dan pegawai terlebih dahulu
		</div>
	</div>
</div>
@endsection