@extends('layouts.app')

@section('content')
<div class="container">
	@if(Session::has('alert-success'))
	    <div class="alert alert-success">
	        {{ Session::get('alert-success') }}
	    </div>
	@endif
	<div class="panel panel-info">
		<div class="panel-heading"><b>Golongan</b></div>
		<div class="panel-body">
		<a class="btn btn-success" href="{{url('golongan/create')}}">
			<b>
				<span class="glyphicon glyphicon-plus-sign"></span>Tambah
			</b>
		</a>
		<br><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
				<tr class="bg-primary">
					<th>No</th>
					<th>Kode Golongan</th>
					<th>Nama Golongan</th>
					<th>Besaran Uang</th>
					<th colspan="2">Action</th>
				</tr>
				</thead>

				@php
				$no=1;
				@endphp
				<tbody>
					@foreach($golongan as $data)
					<tr>
						<td> {{$no++}} </td>
						<td> {{$data->kode_golongan}} </td>
						<td> {{$data->nama_golongan}} </td>
						<td> Rp.{{$data->besaran_uang}} </td>
						<td>
							<a class="btn btn-info btn-sm" href="{{route('golongan.edit', $data->id)}}"><span class="glyphicon glyphicon-edit"></span>Ubah</a>
						</td>
						<td>
							<form method="POST" action="{{route('golongan.destroy', $data->id)}}">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menghapus data ?');">
									<span class="glyphicon glyphicon-trash"></span>
									Hapus
								</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection