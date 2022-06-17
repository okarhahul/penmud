@extends('layouts.main')

@section('container')

{{-- Ini adalah halaman yang tampil pada menu jurnalistik di home --}}

    <h3>{{ $category_sastra }}</h3>
    <hr>
    

    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($sastra as $catsastra)
        <div class="col">
          <div class="card h-100 shadow-sm">
            <img src="asset/img/{{ $catsastra->gambar }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">
                <a href="/sastra?categories_sastra={{ $catsastra->slug }}" class="text-decoration-none">{{ $catsastra->judul }}</a>
              </h5>
              <hr>
              <p>Ditulis oleh {{ $catsastra->user->name }}</p>
              <p class="card-text">{{ $catsastra->headline }}</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">{{ $catsastra->created_at->diffForHumans() }}</small>
            </div>
          </div>
        </div>
      @endforeach
    </div>
@endsection