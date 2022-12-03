@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2 class="text-center">Detail Data Company</a></h2>
        <div class="row mx-auto" style="max-width: 540px;">
            <div class="ml-auto mb-3" style="text-align: right">
                <a href="{{ route('companies.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>
                    Kembali</a>
            </div>
        </div>
        <div class="card mx-auto" style="width: 500px;">
            <img src="{{ url('storage/app/company/' . $companies->logo) }}">
            <div class="card-body">
                <p>Nama Company :{{ $companies->nama }}</p>
                <p>Email :{{ $companies->email }}</p>
                <p>Website :{{ $companies->website }}</p>
            </div>
        </div>
    </div>
@endsection
