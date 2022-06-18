@extends('layouts.main')

@section('container')

{{-- ini adalah halaman tampil single post --}}

    <div class= "container">

        {{-- Menampilkan judul dan penulis --}}
        <p class="fs-2 fw-bolder">{{ $post_jurnalistik->judul }}</p>
        <p class="fs-6 text-muted">Penulis {{ $post_jurnalistik->penulis }}</p>
        <p class="fs-6 text-muted">Editor {{ $post_jurnalistik->editor }}</p>
        
        {{-- Menampilkan kategori --}}
        <p>Category {{ $post_jurnalistik->categoryJurnalistik->name }}</p>


        {{-- Menampilkan gambar --}}
        @if ($post_jurnalistik->image)
        <img src="{{ asset('storage/' . $post_jurnalistik->image) }}" alt="" class="img-fluid d-flex mb-5">
        @else
        <img src="https://picsum.photos/200/300?grayscale" alt="" class="img-fluid d-flex mb-5">
        @endif

        {{-- Ini menampilkan body --}}
        {{-- Ini berfungsi untuk mencetak tulisan yang berisikan tag html --}}
        <p class="lead">
            {!! $post_jurnalistik->body !!}
        </p>

        {{-- Menampilkan fitur like dan komentar --}}

        {{-- Ini itu adalah fitur like dan komentarnya --}}

        <div class="d-grid gap-2 d-md-block mb-3">
            <button class="btn btn-danger justify-content-end" type="button"><i class="bi bi-heart"></i> Suka</button>
            <button class="btn btn-primary" id="btn-komentar-utama"><i class="bi bi-chat-square-text"></i> Komentar</button>
          </div>

        {{-- ini fitur dari komentar ketika diklik --}}
        <input type="hidden" name="jurnalistik_id" value="{{ $post_jurnalistik->id }}">
        <form action="/jurnalistik/komentar" style="display:none;" id="komentar-utama" method="post">
            @csrf
            <input type="hidden" name="post_jurnalistik_id" value="{{ $post_jurnalistik->id }}">
            <input type="hidden" name="parent" value="0">
            <textarea class="form-control mb-3" name="konten" cols="30" rows="4"></textarea>
            <input type="submit" class="btn btn-primary" value="Kirim">
        </form>

        {{-- ini adalah ketika komentar itu sudah di kirim --}}
        <h6>Komentar</h6>
        <hr>
        <ul class="list-unstyled activity-list">
            @if ($post_jurnalistik->komentar_jurnalistik_id)
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

        <div class="mt-3">
            <a href="/jurnalistik">Kembali untuk mencari berita lainnya</a>
        </div>
    </div>

    {{-- <div id="disqus_thread" class="mt-4"></div>
    <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://lpm-pena-muda.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script> --}}
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


