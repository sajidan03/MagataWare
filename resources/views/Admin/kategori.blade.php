@extends('Admin.template')
@section('content')
<div class="container mt-10">
    <div class="d-flex justify-content-between">
        <h1>Data Kategori</h1>
        {{-- <a href="" class="btn btn-primary" style="height: 40px">Add new categories</a> --}}
        <form action="{{ $route }}" method="post">
            <div class="mb-3 mt-3 d-flex">
                @csrf
                <div class="container">
                    <input type="text" class="form-control" id="name" placeholder="Category name" name="name" value="{{ $nama->name ?? '' }}" style="width:300px">
                </div>
                <input type="submit" value="CREATE" class="container btn btn-primary" id="store">
            </div>
        </form>
    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
        </div>
    @endif
    @if (session('danger'))
        <div class="alert alert-danger alert-dismissible">
            {{session('danger')}}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <body>
            <body>
                @foreach ($kategori  as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <a href="{{ route('kategori-edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-info">EDIT</a>
                        <a href="{{ route('kategori-delete', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin Hapus?')">HAPUS</a>
                    </td>
                </tr>
                @endforeach
            </body>
        </body>
    </table>
</div>
@endsection
