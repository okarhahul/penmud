@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit postingan</h1>
    </div>

    <div class="col-lg-8">
        <form method="post" action="/dashboard/jurnalistik/{{ $jurnalistik->slug }}" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="mb-3">
              <label for="judul" class="form-label">Judul</label>
              <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" required autofocus value="{{ old('judul', $jurnalistik->judul) }}">
              @error('judul')
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>

            <div class="mb-3">
              <label for="categoryJurnalistik" class="form-label">Kategori</label>
              <select class="form-select" name="category_jurnalistik_id">
                @foreach ($categoryJurnalistik as $catjurnal)
                {{-- <option value="{{ $catjurnal->id }}">{{ $catjurnal->name }}</option> --}}
                  @if(old('category_jurnalistik_id', $jurnalistik->category_jurnalistik_id) == $catjurnal->id)
                    <option value="{{ $catjurnal->id }}" selected>{{ $catjurnal->name }}</option>
                  @else
                    <option value="{{ $catjurnal->id }}">{{ $catjurnal->name }}</option>
                  @endif
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="image" class="form-label">Pilih gambar</label>
              <input type="hidden" name="oldImage" value="{{ $jurnalistik->image }}">
              @if($jurnalistik->image)
                <img src="{{ asset('storage/' . $jurnalistik->image) }}" class="img-preview img-fluid mb-3 col-md-7 d-block">
              @else
                <img class="img-preview img-fluid mb-3 col-md-7">
              @endif
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
              <input id="body" type="hidden" name="body" value="{{ old('body', $jurnalistik->body) }}" required>
              <trix-editor input="body"></trix-editor>
            </div>
            <button type="submit" class="btn btn-primary">Update postingan <span data-feather="send"></span> </button>
          </form>
    </div>

    {{-- <script>
      const judul = document.querySelector('#judul');
      const slug = document.querySelector('$slug');

      judul.addEventListener('change', function(){
        fetch('dashboard/jurnalistik/checkSlug?judul=' + judul.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
      });

      document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
      })
    </script> --}}

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