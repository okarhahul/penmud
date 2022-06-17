@extends('dashboard.layouts.main')

@section('container')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Postingan Fotografi</h1>
    </div>

    <div class="table-responsive col-lg-8">
      <a href="/dashboard/fotografi/create" class="btn btn-primary mb-3"><span data-feather="plus"></span> Tambah postingan baru</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Judul</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($fotografi as $foto)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $foto->judul }}</td>
              <td>
                <a href="/dashboard/fotografi/{{ $foto->slug }}" class="badge bg-info">
                    <span data-feather="eye"></span>
                </a>
                <a href="/dashboard/fotografi/{{ $foto->slug }}/edit" class="badge bg-warning">
                  <span data-feather="edit"></span>
              </a>
                <form action="/dashboard/fotografi/{{ $foto->slug }}" method="post" class="d-inline">
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