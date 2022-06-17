@extends('layouts.main')

@section('container')

{{-- ini adalah halaman tampil single post --}}

    <div class= "container">
        <img src="https://picsum.photos/200?grayscale" alt="" class="img-fluid">
        <h2>{{ $post_sastra->judul }}</h2>
        <p>Ditulis oleh {{ $post_sastra->user->name }}</p>
        <p>Category <a href="/categories_sastra/{{ $post_sastra->categorySastra->slug }}">{{ $post_sastra->categorySastra->name }}</a></p>
        <h3>{{ $post_sastra->penulis }}</h3>

        {{-- Ini berfungsi untuk mencetak tulisan yang berisikan tag html --}}
        {!! $post_sastra->body !!}
    </div>

<a href="/sastra">Kembali untuk mencari berita lainnya</a>
@endsection