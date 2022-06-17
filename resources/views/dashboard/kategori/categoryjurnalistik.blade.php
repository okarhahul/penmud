@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Kategori Jurnalistik</h1>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success col-lg-6" role="alert">
      {{ session('success') }}
    </div>
    @endif

    <div class="table-responsive col-lg-6">
      <a href="/dashboard/jurnalistik/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah postingan baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Kategori</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($categoryJurnalistik as $catjurnal)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $catjurnal->name }}</td>
              <td>
                <a href="/dashboard/categoryjurnalistik/{{ $catjurnal->slug }}" class="badge bg-info">
                    <span data-feather="eye"></span>
                </a>
                <a href="/dashboard/categoryjurnalistik/{{ $catjurnal->slug }}/edit" class="badge bg-warning">
                    <span data-feather="edit"></span>
                </a>
                <form action="/dashboard/categoryjurnalistik/{{ $catjurnal->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                <button class="badge bg-danger border-0" onclick="return confirm ('Apakah kamu yakin ingin menghapus postingan ini?')"><span data-feather="trash-2"></span></button>
                </form>
              </td>
            </tr>
          @endforeach
          </tbody>
        </table>
      </div>

@endsection