@extends('layouts.main')

@section('container')

    <h3>Sastra {{ $keterangan }}</h3>
    <hr>

    <div class="row d-flex justify-content-start">
      <div class="col-md-6">
        <form action="/sastra" id="search">
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
      <div class="row row-cols-1 row-cols-md-3 g-4" id="result">
        @foreach ($sastra as $sast)
          <div class="col">
            <div class="card h-100 shadow-sm">
              
              {{-- Menampilkan gambar --}}
              @if ($sast->image)
              <img src="{{ asset('storage/' . $sast->image) }}" alt="" class="img-fluid d-flex mb-5">
              @else
              <img src="" alt="" class="">
              @endif

              {{-- Card --}}
              <div class="card-body">
                <h5 class="card-title">
                  <a href="/sastra/{{ $sast->slug }}" class="text-decoration-none">{{ $sast->judul }}</a>
                </h5>
                <p>penulis {{ $sast->penulis }}</p>
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
    <p class="text-center">Mohon maaf yang anda cari tidak di temukan</p>
    @endif

    <div class="d-flex mt-3">
      {{ $sastra -> links() }}
    </div>


    <script>
      let form = document.getElementById('search');

      if(form) {
          form.addEventListener('beforeinput', e => {
          const formdata = new FormData(form);
          let search = formdata.get('search');
          let url = "{{ route('searchSas', "search=") }}"+search
     
          fetch(url)
          .then(response => response.json())
          .then(data => {
          let i;
          let result = "";
          if(data.length === 0){
              result += '<div class="mb-3">Data tidak ditemukan</div>'  
          }
          for (i=0; i < data.length; i++) {
              let sastra = data[i];
              console.log(data[i])
              result += ` <div class="col">
            <div class="card h-100 shadow-sm">
              
              {{-- Menampilkan gambar --}}
              @if ($sast->image)
              <img src="{{ asset('storage/' . $sast->image) }}" alt="" class="img-fluid d-flex mb-5">
              @else
              <img src="" alt="" class="">
              @endif

              {{-- Card --}}
              <div class="card-body">
                <h5 class="card-title">
                  <a href="/sastra/${data[i].slug}" class="text-decoration-none">${data[i].judul}</a>
                </h5>
                <p>penulis ${data[i].penulis}</p>
                <p>Category <a href="/sastra?categorySastra={{ $sast->categorySastra->slug }}" class="text-decoration-none">${data[i].category_sastra.name}</a></p>
                <hr>
                <p class="card-text">${data[i].headline}</p>
              </div>
              <div class="card-footer">
              <small class="text-muted">${data[i].created_at}</small>
              </div>
            </div>
          </div>`;
              // console.log(data[i]);
             
          }
          document.getElementById('result').innerHTML = result;
          })
          .catch((err) => console.log(err))
          })
      console.log(form)
      }
  </script>
@endsection