@extends('layouts.index')

@section('content')

<div class="mx-3 mt-4">
    <h1>Selamat Datang</h1>
    <p class="text-secondary">Dashboard</p>
    <div class="d-flex justify-content-center align-items-center gap-5" style="height: calc(100vh - 300px); margin-top: 56px;">
        <div class="card shadow-sm px-3">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3 align-items-center">
                    <img src="{{ asset('assets/icons/obat.svg' )}}" class="img-fluid w-25" alt="logo obat">
                    <h5 class="card-title">40</h5>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="" class="btn btn-primary justify-content-end">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="card shadow-sm px-3">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3 align-items-center">
                    <img src="{{ asset('assets/icons/obat.svg' )}}" class="img-fluid w-25" alt="logo obat">
                    <h5 class="card-title">40</h5>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="" class="btn btn-primary justify-content-end">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="card shadow-sm px-3">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-3 align-items-center">
                    <img src="{{ asset('assets/icons/obat.svg' )}}" class="img-fluid w-25" alt="logo obat">
                    <h5 class="card-title">40</h5>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="" class="btn btn-primary justify-content-end">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
