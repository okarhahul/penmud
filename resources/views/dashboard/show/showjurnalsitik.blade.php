@extends('dashboard.layouts.main')

@section('container')

    <div class="container">    
        <div class="row my-3">
            <div class="col-lg-8">
                <h2 class="mb-3">{{ $jurnalistik->judul }}</h2>

                <a href="/dashboard/jurnalistik" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke daftar postingan</a>
                <a href="/dashboard/jurnalistik/{{ $jurnalistik->slug }}/edit" class="btn btn-warning">
                    <span data-feather="edit"></span> Edit
                </a>
                <form action="/dashboard/jurnalistik/{{ $jurnalistik->slug }}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                  <button class="btn btn-danger border-0" onclick="return confirm ('Apakah kamu yakin ingin menghapus postingan ini?')"><span data-feather="trash-2"></span> Hapus</button>
                </form>

                @if ($jurnalistik->image)
                <img src="{{ asset('storage/' . $jurnalistik->image) }}" alt="" class="img-fluid d-flex mt-3">
                @else
                <img src="https://picsum.photos/200/300?grayscale" alt="" class="img-fluid d-flex mt-3">
                @endif


                <article>
                    {{-- <p>Category <a href="/jurnalistik?categories_jurnalistik={{ $jurnalistik->categoryJurnalistik->slug }}">{{ $jurnalistik->categoryJurnalistik->name }}</a></p>
                    <h3>{{ $jurnalistik->penulis }}</h3> --}}
                
                    {{-- Ini berfungsi untuk mencetak tulisan yang berisikan tag html --}}
                    {!! $jurnalistik->body !!}           
                </article>
            </div>
        </div>   
    </div>
    

@endsection