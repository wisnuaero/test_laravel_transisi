@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2 class="text-center">Detail Data Employees</a></h2>
        <div class="card border-0 shadow rounded">
            <div class="card-body">
                <div class="mb-3" style="text-align: right">
                    <a href="{{ route('employees.index') }}" class="btn btn-danger"><i class="fa-solid fa-arrow-left"></i>
                        Kembali</a>
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Nama</label>
                    <input type="text" disabled class="form-control"name="nama" value="{{ $employees->nama }}">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Email</label>
                    <input type="text" disabled class="form-control"name="nama" value="{{ $employees->email }}">
                </div>
                <div class="form-group">
                    <label class="font-weight-bold">Company</label>
                    <input type="text" disabled class="form-control"name="nama"
                        value="{{ $employees->get_company->nama }}">
                </div>
            </div>
        </div>
    </div>
@endsection
