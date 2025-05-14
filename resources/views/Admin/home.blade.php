@extends('admin.template')
@section('content')
    <div class="container mt-10">
        <h1>Dashboard</h1>
        <br>
        <div class="d-md-flex md gap-3">
            <div class="card bg-danger" style="width: 470px">
                <div class="card-body d-flex align-items-center justify-content-between text-white">
                    <i class="fa-solid fa-gift" style="font-size: 50px"></i>
                    <div class="item-count text-end">
                        <h1>
                            {{ $product->count() }}
                        </h1>
                        <h6>Data Produk</h6>
                    </div>
                </div>
            </div>
            <div class="card bg-warning" style="width: 470px">
                <div class="card-body d-flex align-items-center justify-content-between text-white">
                    <i class="fa-solid fa-user" style="font-size: 50px"></i>
                    <div class="item-count text-end">
                        <h1>
                            {{ $member->count() }}
                        </h1>
                        <h6>Data Member</h6>
                    </div>
                </div>
            </div>
            <div class="card bg-ijo" style="width: 470px">
                <div class="card-body d-flex align-items-center justify-content-between text-white">
                    <i class="fa-solid fa-list" style="font-size: 50px"></i>
                    <div class="item-count text-end">
                        <h1>
                            {{ $category->count() }}
                        </h1>
                        <h6>Data Kategori</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection