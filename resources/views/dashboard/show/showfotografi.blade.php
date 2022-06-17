@extends('dashboard.layouts.main')

@section('container')

    <div class="container">    
        <div class="row my-3">
            <div class="col-lg-8">
                <h2 class="mb-3">{{ $fotografi->judul }}</h2>

                <a href="/dashboard/fotografi" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke daftar postingan</a>
                <a href="" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
                <a href="" class="btn btn-danger"><span data-feather="trash-2"></span> Hapus</a>

                @if ($fotografi->image)
                <img src="{{ asset('storage/' . $fotografi->image) }}" alt="" class="img-fluid d-flex mt-3">
                    @else
               <img src="https://picsum.photos/200/300?grayscale" alt="" class="img-fluid d-flex mt-3">
                    @endif

                <article>
                    {!! $fotografi->body !!}           
                </article>
            </div>
        </div>   
    </div>
    

@endsection