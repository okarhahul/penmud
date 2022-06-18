@extends('layouts.main')

@section('container')

{{-- ini adalah halaman tampil single post --}}

    <div class= "container">
        {{-- Menampilkan judul dan penulis --}}
        <p class="fs-2 fw-bolder">{{ $post_sastra->judul }}</p>
        <p class="fs-6 text-muted">Penulis {{ $post_sastra->penulis }}</p>

        {{-- Menampilkan kategori --}}
        <p>Category {{ $post_sastra->categorySastra->name }}</p>

        {{-- Menampilkan gambar --}}
        @if ($post_sastra->image)
            <img src="{{ asset('storage/' . $post_sastra->image) }}" alt="" class="img-fluid d-flex mb-5">
        @else
            <img src="https://picsum.photos/200/300?grayscale" alt="" class="img-fluid d-flex mb-5">
        @endif


        <h3>{{ $post_sastra->penulis }}</h3>

        {{-- Ini berfungsi untuk mencetak tulisan yang berisikan tag html --}}
        {!! $post_sastra->body !!}
    </div>

<a href="/sastra">Kembali untuk mencari berita lainnya</a>
@endsection