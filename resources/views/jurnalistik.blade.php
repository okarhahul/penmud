@extends('layouts.main')

@section('container')

{{-- Ini adalah halaman yang tampil pada menu jurnalistik di home --}}

    <h3 class="">Jurnalistik {{ $keterangan }}</h3>
    <hr>

    <div class="row d-flex justify-content-start">
      <div class="col-md-6">
        <form action="/jurnalistik">
          @if (request('categoryJurnalistik'))
          <input type="hidden" name="categoryJurnalistik" value="{{ request('categoryJurnalistik') }}">
          @endif
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Carinya disini..." name="search">
            <button class="btn btn-dark" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>


    @if ($jurnalistik->count())
      <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($jurnalistik as $jurnal)
          <div class="col">
            <div class="card h-100 shadow-sm">

              {{-- Menampilkan gambar --}}
              @if ($jurnal->image)
                <img src="{{ asset('storage/' . $jurnal->image) }}" alt="" class="img-fluid d-flex">
                @else
             <img src="https://picsum.photos/200/300?grayscale" alt="" class="img-fluid d-flex">
                @endif

              {{-- Card --}}
              <div class="card-body">
                <h5 class="card-title">
                  <a href="/jurnalistik/{{ $jurnal->slug }}" class="text-decoration-none">{{ $jurnal->judul }}</a>
                </h5>
                <p>Penulis: {{ $jurnal->penulis }}</p>
                <p>Editor: {{ $jurnal->editor }}</p>
                <p>Category <a href="/jurnalistik?categoryJurnalistik={{ $jurnal->categoryJurnalistik->slug }}" class="text-decoration-none">{{ $jurnal->categoryJurnalistik->name }}</a></p>
                <hr>
                <p class="card-text">{{ $jurnal->headline }}</p>
              </div>
              <div class="card-footer">
              <small class="text-muted">{{ $jurnal->created_at->diffForHumans() }}</small>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else 
    <p class="text-center">Mohon maaf yang anda cari tidak di temukan</p>
    @endif

    <div class="d-flex mt-3">
      {{ $jurnalistik -> links() }}
    </div>
@endsection

    {{-- <script
    src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
    crossorigin="anonymous"></script>

    <script>
          $(document).ready(function{
            readData();
            $("search").keyup(function() {
              var strcari = $("search").val();
              if (strcari != "") {
                $("#read").html('Sedang mencari data...');
                $.ajax({
                  type: "get",
                  url : "{{ url('ajax') }}",
                  data : "name=" + strcari,
                  success:function(data){
                    $("#searchlist").html(data);
                  }
                });
              } else {
                readData();
              }
            });
          });

          function readData(){
            $.get("{{ url('read') }}"), {}
            
            function (data,status) {
              $('#read').html(data);
            }
          }
    </script> --}}