@extends('template')
@section('content')
<div class="container-fluid mt-10">
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 600px;">
        <h5 class="fw-bold">Confirm your payment</h5>
        <p class="text-muted">Quickly and secure, free transactions.</p>

        <div class="bg-light rounded p-3">
            <h6 class="mb-3">Details</h6>
            <div class="d-flex justify-content-between">
                <span>Date</span>
                <span>{{ now()->format('d-m-Y') }}</span>
            </div>
            {{-- <div class="d-flex justify-content-between">
                <span>Payment method</span>
                <span>Bank Transfer</span>
            </div> --}}
            {{-- <div class="d-flex justify-content-between">
                <span>Card number</span>
                <span>**** **** **** 8888</span>
            </div> --}}
            <div class="mt-3 d-flex justify-content-between">
                <label for="rekeningInput" class="form-label">Pilih Bank</label>
                <div class="input-group mt-2 " style="width: 200px">
                    <select class="form-select custom-input" id="bankSelect" aria-label="Pilih Bank" style="width: 120px;">
                        <option value="bank">Bank</option>
                        <option value="dana">Dana</option>
                        <option value="ovo">OVO</option>
                        <option value="gopay">GoPay</option>
                        <!-- Tambahkan opsi lain sesuai kebutuhan -->
                    </select>
                </div>
            </div>

            <style>
                .custom-input {
                    height: 35px; /* Atur tinggi input sesuai kebutuhan */
                    padding: 5px 10px; /* Sesuaikan padding jika perlu */
                    font-size: 12px;
                }
            </style>
            <div class="mt-3 d-flex justify-content-between">
                <label for="rekeningInput" class="form-label">Nomor Rekening</label>
                <div class="input-group mt-2">
                    <span class="input-group-text custom-input" id="basic-addon1"><i class="fa fa-credit-card"></i></span>
                    <input type="text" class="form-control custom-input" id="rekeningInput" placeholder="Masukkan nomor rekening Anda" aria-describedby="basic-addon1" style="width: 100px">
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <span>Cardholder name</span>
                <span>{{ Auth::user()->name ?? 'Your Name' }}</span>
            </div>
            <div class="d-flex justify-content-between">
                <span>Email</span>
                <span>{{ Auth::user()->email ?? 'you@mail.com' }}</span>
            </div>
            {{-- <div class="container mt-3">
                <label for="emailInput" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i></span>
                    <input type="text" class="form-control" id="emailInput" placeholder="Masukkan email Anda" aria-describedby="basic-addon1">
                </div>
            </div> --}}
            <hr>
            <div class="d-flex justify-content-between fw-bold">
                <span>Total amount</span>
                <span>Rp.{{ number_format($total, 0, ',', '.') }}</span>
            </div>
            <div class="mt-3">
                <label for="bukti_transfer" class="form-label">Upload Bukti Transfer</label>
                <input type="file" name="bukti_transfer" id="bukti_transfer" class="form-control" required>
            </div>
        </div>

        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-outline-secondary w-50 me-2">Cancel Payment</button>
            <button class="btn btn-primary w-50">Confirm Payment</button>
        </div>
    </div>

</div>
@endsection