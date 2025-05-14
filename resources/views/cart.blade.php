    @extends('template')
    @section('content')
    <div class="container mt-10">
        <h3 style="text-align: center">Keranjang Saya</h3>
        <form action="">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th style="text-align: center">No</th>
                            <th style="text-align: center">Item</th>
                            <th style="text-align: center">Price</th>
                            <th style="text-align: center">Quantity</th>
                            <th style="text-align: center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $total = 0;
                        @endphp
                        @foreach ($cart as $item)
                        <tr class="">
                            <td style="text-align: center">{{ $loop->iteration }}</td>
                            <td>
                                <div class="container d-flex" style="height: 60px">
                                    <div class="">
                                        <img src="{{ asset('storage/product/'.$item->product->image) }}" alt="" style="width: 60px; height: 60px">
                                    </div>
                                    <div class="col-8" style="padding-left: 12px">
                                        <h6>{{ $item->product->name }} | {{ $item->product->categorie->name }}</h6>
                                        <p>{{ Str::limit($item->product->descriptions, 50 , '...') }}</p>
                                    </div>
                                </div>
                            </td>
                            <td style="text-align: center">Rp.{{ number_format($item->price,0,',','.') }}</td>
                            <td>
                                <div class="container d-flex align-content-center gap-2 justify-content-center" style="align-items: center">
                                    <form action="{{ route('cart-kurang', Crypt::encrypt($item->id)) }}" method="post">
                                        @csrf
                                        <button type="submit">
                                            <h5 style="text-align: center">-</h5>
                                        </button>
                                    </form>
                                        {{ $item->qty }}
                                        <form action="{{ route('cart-tambah', Crypt::encrypt($item->id)) }}" method="post">
                                            @csrf
                                            <button type="submit">
                                                <h5 style="text-align: center">+</h5>
                                            </button>
                                        </form>
                                </div>
                            </td>
                            <td style="text-align: center">{{ number_format($item->price * $item->qty,0,',','.') }}</td>
                        </tr>
                        @php
                            $total = $total + ($item->price * $item->qty);
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="container">
                    <h5 style="text-align: end">total : {{ $total }}</h5>
                    <div class="container d-flex justify-content-between">
                        <button>Halo</button>
                        <button>Halo</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @endsection
