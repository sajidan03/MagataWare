@extends('template')
@section('content')
<div class="card shadow-sm p-4">
    <h5 class="fw-bold">Confirm your payment</h5>
    <p class="text-muted">Quickly and secure, free transactions.</p>

    <div class="bg-light rounded p-3">
        <h6 class="mb-3">Details</h6>
        <div class="d-flex justify-content-between">
            <span>Date</span>
            <span>{{ now()->format('d-m-Y') }}</span>
        </div>
        <div class="d-flex justify-content-between">
            <span>Payment method</span>
            <span>Bank Transfer</span>
        </div>
        <div class="d-flex justify-content-between">
            <span>Card number</span>
            <span>**** **** **** 8888</span>
        </div>
        <div class="d-flex justify-content-between">
            <span>Cardholder name</span>
            <span>{{ Auth::user()->name ?? 'Your Name' }}</span>
        </div>
        <div class="d-flex justify-content-between">
            <span>Email</span>
            <span>{{ Auth::user()->email ?? 'you@mail.com' }}</span>
        </div>
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

@endsection