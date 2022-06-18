@extends('layouts.main')

@section('container')

{{-- ini adalah halaman tampil single post --}}

    <div class= "container">

        {{-- Menampilkan judul dan penulis --}}
        <p class="fs-2 fw-bolder">{{ $post_fotografi->judul }}</p>
        <p class="fs-6 text-muted">Pemilik {{ $post_fotografi->penulis }}</p>

        

        <img src="https://picsum.photos/200?grayscale" alt="" class="img-fluid">
        <h2>{{ $post_fotografi->judul }}</h2>
        <p>Ditulis oleh {{ $post_fotografi->user->name }}</p>
        <h3>{{ $post_fotografi->penulis }}</h3>

        {{-- Ini berfungsi untuk mencetak tulisan yang berisikan tag html --}}
        {!! $post_fotografi->body !!}
    </div>


<a href="/fotografi">Kembali untuk mencari berita lainnya</a>
@endsection