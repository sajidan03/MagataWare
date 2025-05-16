@extends('template')
@section('content')
<div class="container-fluid mt-10">
    <div class="card shadow-sm p-4 mx-auto" style="max-width: 500px;">
        <h5 class="fw-bold">Confirm your payment</h5>
        <p class="text-muted">Quickly and secure, free transactions.</p>

        <div class=" rounded p-3">
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
                    </select>
                </div>
            </div>
            <style>
                .custom-input {
                    height: 35px;
                    padding: 5px 10px;
                    font-size: 12px;
                },
                .short-input {
                    max-width: 250px;
                }
            </style>
            <div class="mt-3 d-flex justify-content-between">
                <label for="rekeningInput" class="form-label">Nomor Rekening</label>
                <div class="input-group" style="max-width: 300px;">
                    <span class="input-group-text custom-input" id="basic-addon1">
                        <i class="fa fa-credit-card"></i>
                    </span>
                    <input type="text" class="form-control custom-input" id="rekeningInput"
                        placeholder="Masukkan nomor rekening Anda" aria-describedby="basic-addon1">
                </div>
            </div>
            <br>
            <div class="d-flex justify-content-between">
                <span>Cardholder name</span>
                <span>{{ Auth::user()->name ?? 'Your Name' }}</span>
            </div>
            <br>
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
        <div class="d-flex mt-3">
            <img id="previewImage" src="" alt="Preview Bukti Transfer" style="max-width: 200px; display: none;">
        </div>
        {{-- <script>
            document.getElementById("bukti_transfer").addEventListener('change', function(event)){
            const file = event.target.files[0];
            const preview = document.getElementById("previewImage");
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
        </script> --}}
        <script>
            document.getElementById('bukti_transfer').addEventListener('change', function(event) {
                const file = event.target.files[0];
                const preview = document.getElementById('previewImage');

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        preview.src = e.target.result;
                        preview.style.display = 'block';
                    };

                    reader.readAsDataURL(file);
                }
            });
        </script>
        <div class="d-flex justify-content-between mt-4">
            <button class="btn btn-outline-secondary w-50 me-2">Cancel Payment</button>
            <button class="btn btn-primary w-50">Confirm Payment</button>
        </div>
    </div>

</div>
@endsection
