@extends('layouts.main')

@section('container')

    <h3>Fotografi</h3>
    <hr>
    
    <div class="row d-flex justify-content-start">
      <div class="col-md-6">
        <form action="/fotografi">
          @if (request('categoryFotografi'))
          <input type="hidden" name="categoryFotografi" value="{{ request('categoryFotografi') }}">
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Carinya disini..." name="search">
            <button class="btn btn-dark" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>

    @if($fotografi->count())
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($fotografi as $foto)
        <div class="col">
          <div class="card h-100 shadow-sm">
            <img src="https://picsum.photos/200?grayscale" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">
                <a href="/fotografi/{{ $foto->slug }}" class="text-decoration-none">{{ $foto->judul }}</a>
              </h5>
              <p>Ditulis oleh {{ $foto->user->name }}</p>
              <hr>
              <p class="card-text">{{ $foto->headline }}</p>
            </div>
            <div class="card-footer">
            <small class="text-muted">{{ $foto->created_at->diffForHumans() }}</small>
            </div>
          </div>
        </div>
      @endforeach
      @else 
      <p class="text-center">Mohon maaf yang anda cari tidak di temukan</p>
      @endif
    </div>

    <div class="d-flex mt-3">
      {{ $fotografi -> links() }}
    </div>

@endsection