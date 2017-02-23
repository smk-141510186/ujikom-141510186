@extends('layouts.app')

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading"><b>Lembur Pegawai</b></div>
		<div class="panel-body">
		<a class="btn btn-info" href="{{url('lembur-pegawai/create')}}">
			<b>
				<span class="fa fa-plus-circle"></span>Tambah
			</b>
		</a>
		<br><br>
			<table class="table table-striped table-bordered table-hover">
				<thead>
				<tr class="bg-primary">
					<th>No</th>
					<th>Kategori Lembur</th>
					<th>NIP</th>
					<th>Jumlah Jam</th>
					<th colspan="2">Action</th>
				</tr>
				</thead>

				@php
				$no=1;
				@endphp
				<tbody>
					@foreach($lpegawai as $data)
					<tr>
						<td> {{$no++}} </td>
						<td> <?php echo "Rp.".number_format($data->KategoriLembur->besaran_uang,2,",","."); ?> </td>
						<td> {{$data->Pegawai->nip}} </td>
						<td> {{$data->jumlah_jam}} </td>
						<td>
							<a class="btn btn-warning btn-sm" href="{{route('lembur-pegawai.edit', $data->id)}}"><span class="fa fa-edit"></span>Ubah</a>
						</td>
						<td>
							<form method="POST" action="{{route('lembur-pegawai.destroy', $data->id)}}">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<button class="btn btn-danger btn-sm" onclick="return confirm('Apakah yakin ingin menghapus data ?');" type="submit">
									<span class="fa fa-trash-o"></span>Hapus
								</button>
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<b>*Note </b>: Sebelum mengisi data ini, mohon isi data kategori lembur dan pegawai terlebih dahulu
		</div>
	</div>
@endsection