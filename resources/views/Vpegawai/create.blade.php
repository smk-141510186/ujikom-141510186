@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-primary">
			<div class="panel-heading">Registrasi Pegawai</div>
				<div class="panel-body">
					<form action="{{route('pegawai.store')}}" method="post">
					{{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">NIP</label>
                        <div class="col-md-8 form-group">
                            <input type="text" name="nip" class="form-control" autofocus>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Jabatan</label>
                        <div class="col-md-8 form-group">
                            <select name="jabatan_id" class="form-control" autofocus>
                                @foreach($jabatan as $data)
                                <option value="{{$data->id}}">{{$data->nama_jabatan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Golongan</label>
                        <div class="col-md-8 form-group">
                            <select name="golongan_id" class="form-control" autofocus>
                                @foreach($golongan as $data)
                                <option value="{{$data->id}}">{{$data->nama_golongan}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                        
                    <div class="form-group">
                        <label class="col-md-4 control-label">Pilih Foto</label>
                        <div class="col-md-8 form-group">
                            <input type="file" id="photo" name="photo">
                        </div>
                    </div>

                    

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
</form>
@endsection