@extends('admin.template')
@section('content')
<div class="container mt-10">
    <div class="d-flex justify-content-between">
        <h1>Data Produk</h1>
        <a href="{{ route('product-create') }}" class="btn btn-primary " style="height: 40px">Add new Product</a>
    </div>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
        </div>
    @endif
    <table class="table table-striped">
        <thead>
            <tr>
                <th>no</th>
                <th>Product name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Category</th>
                <th>Action</th>
            </tr>
        </thead>
        <body>
            @foreach ($product as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ number_format($item->price, 0, ',', '.') }}</td>
                    <td>{{ substr($item->descriptions,0,20) }}...</td>
                    <td><img src="{{asset('storage/product/'.$item->image)}}"
                        alt="" style="width: 100px; height:100px;">
                    </td>
                    <td>{{ $item->categorie->name }}</td>
                    <td>
                        <a href="{{ route('product-edit', Crypt::encrypt($item->id)) }}" class="btn btn-sm btn-info">EDIT</a>
                        <a href="{{ route('product-delete', Crypt::encrypt($item->id) ) }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">HAPUS</a>
                    </td>
                </tr>
            @endforeach
        </body>
    </table>
</div>
@endsection
