@extends('Admin.template')
@section('content')
<div class="container mt-10">
    <h4>Profil</h4>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

        </div>
    @endif

    <form action="{{ Route('update-profil') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3">
            <label for="user_name" class="form-label">USER NAME :</label>
            <input type="text" name="user_name" id="user_name" class="form-control" value="{{ Auth::user()->name }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="member_name" class="form-label">MEMBER NAME :</label>
            <input type="text" name="member_name" id="member_name" class="form-control" value="{{ $member->name }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">EMAIL :</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ Auth::user()->email }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="password" class="form-label">PASSWORD :</label>
            <input type="text" name="password" id="password" class="form-control" value="" placeholder="Isi disini jika mau ubah password">
        </div>
        <div class="mb-3 mt-3">
            <label for="no_hp" class="form-label">HANDPHONE NUMBER :</label>
            <input type="number" name="no_hp" id="no_hp" class="form-control" value="{{ $member->no_hp }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="address" class="form-label">ADDRES :</label>
            <textarea name="address" id="address" cols="174" rows="10">{{ $member->address }}</textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="foto" class="form-label">PROFIL</label><br>
            <img src="{{ asset('storage/profil/'.$member->foto) }}" alt="" style="width: auto; height: 250px;">
            <input type="file" class="form-control" id="foto" placeholder="foto" name="foto">
        </div>
        <input type="submit" value="UPDATE" class="container btn btn-primary" id="store">
    </form>
</div>
@endsection
