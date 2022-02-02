@extends('layouts.main')

@section('container')
<h1 class="mb-4">Semua Kategori</h1>
<?php $n=1; ?>
@foreach ($kategories as $kateg)
<article class="mb-3">
    <ul>
        <li>
            <h2><a href="/kategori/{{ $kateg->slug }}"> {{ $n.". ".$kateg->nama }} </a></h2>
        </li>
    </ul>
</article>
<?php $n++; ?>
@endforeach
<a href="/blog"> 
    << Kembali ke blog utama</a>
@endsection