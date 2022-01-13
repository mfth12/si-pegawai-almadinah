@extends('layouts.main')

@section('container')
    <h1>Halaman About</h1>
    <h3>Projects from {{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="{{ $name }}" width="180px" class="img-thumbnail">
@endsection
