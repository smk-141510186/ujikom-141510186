@extends('layouts.app')

@section('content')
	@if(Session::has('alert-success'))
	    <div class="alert alert-success">
	        {{ Session::get('alert-success') }}
	    </div>
	@endif
	<div class="panel panel-primary">
		<div class="panel-heading"><b>Jabatan</b></div>
		<div class="panel-body">
		<a class="btn btn-info" href="{{url('jabatan/create')}}">
			<b>
				<span class="fa fa-plus-circle"></span>Tambah
			</b>
		</a>
		<br><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
				<tr class="bg-primary">
					<th>No</th>
					<th>Kode Jabatan</th>
					<th>Nama Jabatan</th>
					<th>Besaran Uang</th>
					<th colspan="2">Action</th>
				</tr>
				</thead>

				@php
				$no=1;
				@endphp
				<tbody>
					@foreach($jabatan as $data)
					<tr>
						<td> {{$no++}} </td>
						<td> {{$data->kode_jabatan}} </td>
						<td> {{$data->nama_jabatan}} </td>
						<td> <?php echo "Rp.".number_format($data->besaran_uang,2,",","."); ?> </td>
						<td>
							<a class="btn btn-warning btn-sm" href="{{route('jabatan.edit', $data->id)}}">
							<span class="fa fa-edit"></span>Ubah</a>
						</td>
						<td>
							<form method="POST" action="{{route('jabatan.destroy', $data->id)}}">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menghapus data ?');">
									<span class="fa fa-trash-o"></span>Hapus
								</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
@endsection