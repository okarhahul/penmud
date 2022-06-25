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
        
        @endif


        <h3>{{ $post_sastra->penulis }}</h3>

        {{-- Ini berfungsi untuk mencetak tulisan yang berisikan tag html --}}
        {!! $post_sastra->body !!}

        {{-- Menampilkan fitur like dan komentar --}}

        {{-- Ini itu adalah fitur like dan komentarnya --}}

        <div class="d-grid gap-2 d-md-block mb-3">
            <button class="btn btn-danger justify-content-end" type="button"><i class="bi bi-heart"></i> Suka</button>
            <button class="btn btn-primary" id="btn-komentar-utama"><i class="bi bi-chat-square-text"></i> Komentar</button>
          </div>

        {{-- ini fitur dari komentar ketika diklik --}}
        <input type="hidden" name="sastra_id" value="{{ $post_sastra->id }}">
        <form action="/sastra/komentar" style="display:none;" id="komentar-utama" method="post">
            @csrf
            <input type="hidden" name="post_sastra_id" value="{{ $post_sastra->id }}">
            <input type="hidden" name="parent" value="0">
            <textarea class="form-control mb-3" name="konten" cols="30" rows="4"></textarea>
            <input type="submit" class="btn btn-primary" value="Kirim">
        </form>

        {{-- ini adalah ketika komentar itu sudah di kirim --}}
        <h6>Komentar</h6>
        <hr>
        <ul class="list-unstyled activity-list">
            @if ($post_sastra->komentar_sastra_id)
                @foreach ($comments as $coment)
                    <div class="mb-3">
                        <h6 style="">{{ $coment->user->name }}</h6>
                        <small>{{ $coment->konten }}</small>
                        <small class="timestamp d-flex">{{ $coment->created_at->diffForHumans() }}</small>
                        <hr>
                    </div>
                @endforeach
            @else
                    <p class="text-center">belum ada komentar</p>
            @endif
        </ul>
    </div>

<a href="/sastra">Kembali untuk mencari berita lainnya</a>
@endsection

    {{-- Jquery --}}
    {{-- Jquery perlu kita install saat kita membutuhkan saja, jika tidak maka tidak perlu --}}
    <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

    {{-- Script untuk komentar aktif --}}

    <script>
        $(document).ready(function(){
            $('#btn-komentar-utama').click(function(){
                $('#komentar-utama').toggle('slide');
            });
        });
    </script>