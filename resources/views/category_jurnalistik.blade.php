@extends('layouts.main')

@section('container')

{{-- Ini adalah halaman yang tampil pada menu jurnalistik di home --}}

    <h3>{{ $category_jurnalistik }}</h3>
    <hr>

    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($jurnalistik as $catjurnal)
        <div class="col">
          <div class="card h-100 shadow-sm">
            <img src="asset/img/{{ $catjurnal->gambar }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">
                <a href="/jurnalistik?categories_jurnalistik={{ $catjurnal->slug }}" class="text-decoration-none">{{ $catjurnal->judul }}</a>
              </h5>
              <hr>
              <p>Ditulis oleh {{ $catjurnal->user->name }}</p>
              <p class="card-text">{{ $catjurnal->headline }}</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">{{ $catjurnal->created_at->diffForHumans() }}</small>
            </div>
          </div>
        </div>
      @endforeach
    </div>
    
    {{-- <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="asset/img/publikasi.JPG" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Publikasi</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="asset/img/pelantikan2020.jpeg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Pelantikan</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="asset/img/parsjay.JPG" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Parsjay FWB</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Last updated 3 mins ago</small>
          </div>
        </div>
      </div>
    </div> --}}

@endsection