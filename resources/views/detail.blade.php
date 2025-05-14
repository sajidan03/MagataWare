@extends('template')
@section('content')
<div class="container mt-10">
    <div class="row">
        <div class="col-md-4 d-flex justify-content-end">
            <img src="{{ asset('storage/product/'.$produk->image) }}" alt="" style="width: 75%;height: 320px;">
        </div>
        <div class="col-md-5">
            <h3>{{ $produk->name }}</h3>
            <h2>{{ $produk->price }}</h2>
            <ul class="nav nav-tabs mt-4">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#detail">Detail</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#spesifikasi">Spesifikasi</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#info">Info</a>
                </li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane container active" id="detail">
                    <p>
                        {{ $produk->descriptions }}
                    </p>
                </div>
                <div class="tab-pane container fade" id="spesifikasi">
                    {{ $produk->descriptions }}
                </div>
                <div class="tab-pane container fade" id="info">
                    {{ $produk->descriptions }}
                </div>
              </div>
        </div>
        <div class="col-md-3 d-block justify-content-center border border-1 p-4 h-100 rounded">
            <h5>Atur jumlah dan catatan</h5>
            <br>
            <div class="row d-flex d-flex justify-content-between">
                <div class="row">
                    <div class="col-md-6 border rounded">
                        <div class="row" style="text-align: center">
                            <div class="col-md-3">
                                <h2>-</h2>
                            </div>
                            <div class="col-md-6">
                                <h2>0</h2>
                            </div>
                            <div class="col-md-3">
                                <h2>+</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                        <p>Stok total : 92</p>
                    </div>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="col">
                    <p>Subtotal</p>
                </div>
                <div class="col-md-7">
                    <h4>Rp. 100.000</h4>
                </div>
            </div>
            <br><br>
            <div class="row mt-2">
                <button class="btn btn-success">
                    + Keranjang
                </button>
            </div>
            <br>
            <div class="row mt-2">
                <button class="btn border border-success border-2">
                    <a href="" style="text-decoration: none; color: green">Beli</a>
                </button>
            </div>
            <br>
        </div>
    </div>
</div>

@endsection
