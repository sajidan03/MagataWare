@extends('Admin.template')
@section('content')
<div class="container mt-10">
    <div class="d-flex justify-content-between">
        <h1>Data Member</h1>
        <a href="{{ route('member-create') }}" class="btn btn-primary" style="height: 40px">Add new member</a>

    </div>
    {{-- @if (session('success'))
        <div class="alert alert-succes alert-dismissible">
            {{ session('success') }}
        </div>
    @endif --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>No HP</th>
                <th>Adress</th>
                <th>Profil</th>
                <th>Action</th>
            </tr>
        </thead>
        <body>
            @foreach ($member as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->address }}</td>
                <td>
                    <img src="{{ asset('storage/profil/'.$item->foto) }}" alt="" style="width: auto; height: 100px;">
                </td>
                <td>
                    <a href="{{ route('member-edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-info">EDIT</a>
                    <a href="{{ route('member-delete', Crypt::encrypt($item->id)) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus?')">DELETE</a>
                </td>
            </tr>
            @endforeach
        </body>
    </table>
</div>
@endsection
