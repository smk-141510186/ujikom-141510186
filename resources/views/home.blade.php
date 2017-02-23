@extends('layouts.app')

@section('content')
<div class="jumbotron" style="background-color: #80ccff;">
    <h1>Penggajian</h1>
    <p>Hi, {{ Auth::user()->name }}<br>Anda sebagai {{ Auth::user()->permission }}<br>Selamat Datang di Penggajian</p>
</div>
@endsection