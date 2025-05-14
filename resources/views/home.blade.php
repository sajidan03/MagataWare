    @extends('template')
    @section('content')
    <style>
        a{
            text-decoration: none;
            color: black;
        }
    </style>
    <div class="container-fluid mt-10">
        <div class="container">
            <div class="p-5 bg-dark text-white rounded">
                <h1>Selamat datang</h1>
                <p>Silahkan kembali</p>
            </div>
        </div>
        <div class="container">
            <div class="grid-content gap-5 text-start mt-4 justify-content-center">
                @foreach ($produk as $item)
                {{-- <a href="{{ route('info-produk', Crypt::encrypt($item->id)) }}"> --}}
                    <div class="card" style="width: 400px">
                        <img class="card-img-top" src="{{ asset('storage/product/'.$item->image)}}" alt="Card image" height="300px">
                        <div class="card-body">
                            <h4 class="card-title">{{$item->name}} | {{$item->categorie->name}}</h4>
                            <p class="card-text">Rp.{{ $item->price }}</p>
                            <a href="{{ route('keranjang', Crypt::encrypt($item->id)) }}" class="btn btn-primary">Beli</a>
                        </div>
                    </div>
                {{-- </a> --}}
                @endforeach
            </div>
        </div>
    </div>
    @endsection
