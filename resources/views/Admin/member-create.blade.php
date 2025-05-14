@extends('Admin.template')
@section('content')
<div class="container mt-10">
    <h4>Add new member</h4>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ( $errors->all() as $item )
            <li>{{ $item }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('member-store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt3">
            <label for="name" class="form-label">NAME :</label>
            <input type="text" class="form-control" id="name" placeholder="Member name" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label for="no_hp" class="form-label">HANDPHONE NUMBER :</label>
            <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="No HP">
        </div>
        <div class="mb-3 mt-3">
            <label for="address" class="form-label">ADRESS :</label>
            <textarea name="address" id="address" cols="174" rows="10" placeholder="ADRESS"></textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="foto" class="form-label">IMAGE</label>
            <input type="file" name="foto" id="foto" class="form-control" placeholder="IMAGE">
        </div>
        <input type="submit" value="CREATE" class="container btn btn-primary" id="store">
    </form>
</div>
@endsection
