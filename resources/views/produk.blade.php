
@extends('template')
@section('content')
<div class="container mt-10">
    <div class="container p-2">
        <h1>Produk Kami</h1>
        <br>
        <ul class="nav nav-pills justify-content-center gap-3">
            @foreach ($kategori as $key => $item)
          <li class="nav-item">
            <a class="nav-link {{ ($key==0)?'active':''}}" data-bs-toggle="pill" href="#kategori{{$item->id}}">{{$item->name}}</a>
          </li>
          @endforeach
        </ul>
        <div class="tab-content mt-5 ">
            @foreach ($kategori as $key => $item)
            <div class="tab-pane container {{ ($key==0)?'active':''}}" id="kategori{{ $item->id }}">
                <div class="container grid-content gap-3 mt-3">
                    @foreach ($item->Product as $item)
                    <div class="card" style="width:400px">
                        <img class="card-img-top" src="{{ asset('storage/product/'.$item->image)}}" alt="Card image" style="height: 350px">
                        <div class="card-body">
                            <h4 class="card-title">{{$item->name}}</h4>
                            <p class="card-text">Rp.{{$item->price}}</p>
                            <a href="{{ route('info-produk', Crypt::encrypt($item->id)) }}" class="btn btn-primary">Beli</a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
        <br>
        <div class="d-flex flex-wrap gap-3 text-start justify-content-center">
    </div>
</div>
@endsection
