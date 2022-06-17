@extends('layouts.main')

@section('container')

    <h3>Sastra {{ $keterangan }}</h3>
    <hr>

    <div class="row d-flex justify-content-start">
      <div class="col-md-6">
        <form action="/sastra">
          @if (request('categorySastra'))
          <input type="hidden" name="categorySastra" value="{{ request('categorySastra') }}">
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Carinya disini..." name="search">
            <button class="btn btn-dark" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>

    @if($sastra->count())
      <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($sastra as $sast)
          <div class="col">
            <div class="card h-100 shadow-sm">
              <img src="https://picsum.photos/200?grayscale" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">
                  <a href="/sastra/{{ $sast->slug }}" class="text-decoration-none">{{ $sast->judul }}</a>
                </h5>
                <p>Ditulis oleh {{ $sast->user->name }}</p>
                <p>Category <a href="/sastra?categorySastra={{ $sast->categorySastra->slug }}" class="text-decoration-none">{{ $sast->categorySastra->name }}</a></p>
                <hr>
                <p class="card-text">{{ $sast->headline }}</p>
              </div>
              <div class="card-footer">
              <small class="text-muted">{{ $sast->created_at->diffForHumans() }}</small>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else 
    @endif

    <div class="d-flex mt-3">
      {{ $sastra -> links() }}
    </div>
@endsection