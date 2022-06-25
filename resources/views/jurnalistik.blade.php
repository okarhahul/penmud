@extends('layouts.main')

@section('container')

{{-- Ini adalah halaman yang tampil pada menu jurnalistik di home --}}

    <h3 class="">Jurnalistik {{ $keterangan }}</h3>
    <hr>

    <div class="row d-flex justify-content-start">
      <div class="col-md-6">
        <form action="/jurnalistik" id="search">
          {{-- @if (request('categoryJurnalistik'))
          <input type="hidden" name="categoryJurnalistik" value="{{ request('categoryJurnalistik') }}">
          @endif --}}
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Carinya disini..." name="search">
            <button class="btn btn-dark" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>


    @if ($jurnalistik->count())
      <div class="row row-cols-1 row-cols-md-3 g-4" id="result">
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

    <script>
      let form = document.getElementById('search');

      if(form) {
          form.addEventListener('beforeinput', e => {
          const formdata = new FormData(form);
          let search = formdata.get('search');
          let url = "{{ route('search', "search=") }}"+search
     
          fetch(url)
          .then(response => response.json())
          .then(data => {
          let i;
          let result = "";
          if(data.length === 0){
              result += '<div class="mb-3">Data tidak ditemukan</div>'  
          }
          for (i=0; i < data.length; i++) {
              let jurnalistik = data[i];
              result += `<div class="col">
                          <div class="card h-100 shadow-sm">

                          ${data[i].image}
                          <div class="card-body">
                              <h5 class="card-title">
                              <a href="/jurnalistik/${data[i].slug}" class="text-decoration-none">${data[i].judul}</a>
                              </h5>
                              <p>Penulis: ${data[i].penulis}</p>
                              <p>Editor: ${data[i].editor}</p>
                              <p>Category <a href="/jurnalistik?categoryJurnalistik=${data[i].category_jurnalistik.name}" class="text-decoration-none">{{ $jurnal->categoryJurnalistik->name }}</a></p>
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