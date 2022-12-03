@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2 class="text-center">Tambah Data Company</a></h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div style="text-align: right">
                            <a href="{{ route('companies.index') }}" class="btn btn-danger"><i
                                    class="fa-solid fa-arrow-left"></i> Kembali</a>
                        </div>
                        <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama <span class="text-danger small">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama company">
                                <!-- error message untuk nama -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Email <span class="text-danger small">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" placeholder="Masukkan email company"></input>
                                <!-- error message untuk email -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Website <span class="text-danger small">*</span></label>
                                <input type="text" class="form-control @error('website') is-invalid @enderror"
                                    name="website" value="{{ old('website') }}"
                                    placeholder="Masukkan website company"></input>
                                <!-- error message untuk website -->
                                @error('website')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Logo <span class="text-danger small">*</span></label>
                                <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                    name="logo">

                                <!-- error message untuk title -->
                                @error('logo')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-3" style="text-align: right">
                                <button type="reset" class="btn btn-md btn-secondary"><i
                                        class="fa-solid fa-rotate-left"></i> Reset</button>
                                <button type="submit" class="btn btn-md btn-success"><i class="fa-solid fa-check"></i>
                                    Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
