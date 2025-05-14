@extends('admin.template')
@section('content')
    <div class="container mt-10">
        <h4>Add New Product</h4>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>

        @endif
        <form action="{{ route('product-store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Product Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Product Name" name="name">
            </div>
            <div class="mb-3 mt-3">
                <label for="price" class="form-label">Price:</label>
                <input type="number" class="form-control" id="price" placeholder="Price" name="price">
            </div>
            <div class="mb-3 mt-3">
                <label for="descriptions" class="form-label">Description:</label><br>
                {{-- <textarea type="textarea" class="form-control" id="description" placeholder="Description" name="description"> --}}
                <textarea name="descriptions" id="descriptions" cols="174" rows="10"></textarea>
            </div>
            <div class="mb-3 mt-3">
                <label for="image" class="form-label">Image:</label>
                <input type="file" class="form-control" id="image" placeholder="Image" name="image">
            </div><div class="mb-3 mt-3">
                <label for="categories_id" class="form-label">Categories id:</label>
                <select name="categories_id" id="form-control">
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name}}</option>
                    @endforeach
                </select>
            </div>
            <input type="submit" value="Create" class="container btn btn-primary" id="store">
        </form>
    </div>
@endsection
