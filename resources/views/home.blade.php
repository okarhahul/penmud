@extends('layouts.main')

    {{-- Carousel --}}
    @section('container')

    <h3 class="text-center mb-3">
      Rekomendasi untuk kamu
    </h3>

    {{-- <div class="row d-flex justify-content-start">
      <div class="col-md-6">
        <form action="/" id="search">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Carinya disini..." name="search">
            <button class="btn btn-dark" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div> --}}

    <h5>Jurnalistik</h5>
    <hr>
    @if ($jurnalistik->count())
      <div class="row row-cols-1 row-cols-md-3 g-4 mb-3" id="result">
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

    <h5 class="mb-3">Sastra</h5>
    <hr>
    @if($sastra->count())
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
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

  <h5 class="mb-3">Fotografi</h5>
  <hr>
  @if ($fotografi->count())
  <div class="row row-cols-1 row-cols-md-3 g-4 mb-3">
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
            <p>Pemilik {{ $foto->pemilik }}</p>

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

@endsection

{{-- <script>
  let form = document.getElementById('search');
  console.log(form)
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
        result += 'Data tidak ditemukan'  
      }
      for (i=0; i < data.length; i++) {
        let jurnalistik = data[i]
        result += '${jurnalistik.all}';
      }
      document.getElementById('result').innerHTML = result;
    })
    .catch((err) => console.log(err))
  })
</script> --}}