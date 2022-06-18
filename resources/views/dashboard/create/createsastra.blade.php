@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah postingan</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/sastra" class="mb-5" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul') }}">
              @error('judul')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="categorySastra" class="form-label">Kategori</label>
              <select class="form-select" name="category_sastra_id">
                @foreach ($categorySastra as $catsast)
                  @if(old('category_sastra_id') == $catsast->id)
                    <option value="{{ $catsast->id }}" selected>{{ $catsast->name }}</option>
                  @else
                    <option value="{{ $catsast->id }}">{{ $catsast->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="penulis" class="form-label">Penulis</label>
              <input type="text" class="form-control @error('penulis') is-invalid @enderror" id="penulis" name="penulis" required autofocus value="{{ old('penulis') }}">
              @error('penulis')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>


            <div class="mb-3">
              <label for="image" class="form-label">Pilih gambar</label>
              <img class="img-preview img-fluid mb-3 col-md-7">
              <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
              @error('image')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="body" class="form-label">Isi</label>
              @error('body')
              <p class="text-danger">{{ $message }}</p>
              @enderror
              <input id="body" type="hidden" name="body" required value="{{ old('body') }}">
              <trix-editor input="body"></trix-editor>
            </div>
            
            {{-- <div class="mb-3">
              <label for="date" class="form-label">Pilih tanggal</label>
              <input class="form-control" type="date" placeholder="Default input" aria-label="default input example">
            </div> --}}

            <button type="submit" class="btn btn-primary">Tambahkan postingan <span data-feather="send"></span> </button>
          </form>
    </div>

    <script>
      document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
      })


      function previewImage(){
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
          imgPreview.src = oFREvent.target.result;
        }
      }
    </script>

@endsection