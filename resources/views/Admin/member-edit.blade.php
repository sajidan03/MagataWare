@extends('Admin.template')
@section('content')
<div class="container mt-10">
    <h4>Edit Member</h4>
    {{-- @if ($errors->any)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->any as $item)
                <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}

    <form action="{{ route('member-update', Crypt::encrypt($member->id)) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">MEMBER NAME :</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $member->name }}">
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
