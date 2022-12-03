@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2 class="text-center">Edit Data Company</a></h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div class="text-right" style="text-align: right">
                            <a href="{{ route('companies.index') }}" class="btn btn-danger"><i
                                    class="fa-solid fa-arrow-left"></i> Kembali</a>
                        </div>
                        <form action="{{ route('companies.update', $companies->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label class="font-weight-bold">Nama <span class="text-danger small">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama', $companies->nama) }}"
                                    placeholder="Masukkan nama company">
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
                                    name="email" value="{{ old('email', $companies->email) }}"
                                    placeholder="Masukkan email company"></input>
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
                                    name="website" value="{{ old('website', $companies->website) }}"
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
                                <input type="file" name="logo" class="form-control" placeholder="logo">
                                <br>
                                <img src="{{ url('storage/app/company/' . $companies->logo) }}" width="200px">
                            </div>
                            <div class="text-right" style="text-align: right">
                                <button type="reset" class="btn btn-md btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-md btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
