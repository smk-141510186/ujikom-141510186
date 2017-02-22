@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info">
                <div class="panel-heading"><b>Hi, {{ Auth::user()->name }}</b></div>

                <div class="panel-body">
                    Selamat Datang di Penggajian!
                </div>
            </div>
        </div>
    </div>
@endsection
