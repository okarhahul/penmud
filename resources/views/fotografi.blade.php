@extends('layouts.main')

@section('container')

    <h3>Fotografi</h3>
    <hr>
    
    <div class="row d-flex justify-content-start">
      <div class="col-md-6">
        <form action="/fotografi" id="search">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Carinya disini..." name="search">
            <button class="btn btn-dark" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>

    @if ($fotografi->count())
    <div class="row row-cols-1 row-cols-md-3 g-4" id="result">
      @foreach ($fotografi as $foto)
        <div class="col">
          <div class="card h-100 shadow-sm">

            {{-- Menampilkan gambar --}}
            @if ($foto->image)
            <img src="{{ asset('storage/' . $foto->image) }}" alt="" class="img-fluid d-flex">
              @else
           <img src="https://picsum.photos/200/300?grayscale" alt="" class="img-fluid d-flex">
              @endif

            {{-- Card --}}
            <div class="card-body">
              <h5 class="card-title">
                <a href="/fotografi/{{ $foto->slug }}" class="text-decoration-none">{{ $foto->judul }}</a>
              </h5>
              <p>Pemilik {{ $foto->penulis }}</p>

              <hr>
              <p class="card-text">{{ $foto->headline }}</p>
            </div>
            <div class="card-footer">
            <small class="text-muted">{{ $foto->created_at->diffForHumans() }}</small>
            </div>
          </div>
        </div>
      @endforeach
    </div>
  @else 
  <p class="text-center">Mohon maaf yang anda cari tidak di temukan</p>
  @endif
    </div>

    <div class="d-flex mt-3">
      {{ $fotografi -> links() }}
    </div>

    <script>
      let form = document.getElementById('search');

      if(form) {
          form.addEventListener('beforeinput', e => {
          const formdata = new FormData(form);
          let search = formdata.get('search');
          let url = "{{ route('searchFoto', "search=") }}"+search
     
          fetch(url)
          .then(response => response.json())
          .then(data => {
          let i;
          let result = "";
          if(data.length === 0){
              result += '<div class="mb-3">Data tidak ditemukan</div>'  
          }
          for (i=0; i < data.length; i++) {
              let fotografi = data[i];
              console.log(data[i])
              result += `<div class="col">
          <div class="card h-100 shadow-sm">

            {{-- Menampilkan gambar --}}
            @if ($foto->image)
            <img src="{{ asset('storage/' . $foto->image) }}" alt="" class="img-fluid d-flex">
              @else
           <img src="https://picsum.photos/200/300?grayscale" alt="" class="img-fluid d-flex">
              @endif

            {{-- Card --}}
            <div class="card-body">
              <h5 class="card-title">
                <a href="/fotografi/${data[i].slug}" class="text-decoration-none">${data[i].judul}</a>
              </h5>
              <p>Pemilik ${data[i].penulis}</p>

              <hr>
              <p class="card-text">${data[i].headline}</p>
            </div>
            <div class="card-footer">
            <small class="text-muted">${data[i].created_at}</small>
            </div>
          </div>
        </div>`
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