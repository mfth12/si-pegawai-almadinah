@extends('layouts.main')

@section('container')
    <h2>Halaman About</h2>
    <h3>Projects from {{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="Photo profile {{ $name }}" width="180px" class="img-thumbnail">
@endsection
