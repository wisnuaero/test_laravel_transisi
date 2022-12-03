@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2 class="text-center">Tambah Data Employees</a></h2>
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <div style="text-align: right">
                            <a href="{{ route('employees.index') }}" class="btn btn-danger"> Kembali</a>
                        </div>
                        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label class="font-weight-bold">Nama <span class="text-danger small">*</span></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                    name="nama" value="{{ old('nama') }}" placeholder="Masukkan nama employees">
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
                                    name="email" value="{{ old('email') }}"
                                    placeholder="Masukkan email employees"></input>
                                <!-- error message untuk email -->
                                @error('email')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Company <span class="text-danger small">*</span></label>
                                <select class="form-control" name="company" id="get_company">
                                    <option value="">Pilih Company</option>
                                </select>
                                <!-- error message untuk company -->
                                @error('company')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-3" style="text-align: right">
                                <button type="reset" class="btn btn-md btn-secondary">Reset</button>
                                <button type="submit" class="btn btn-md btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Script -->
    <script type="text/javascript">
        // CSRF Token
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function() {

            $("#get_company").select2({
                ajax: {
                    url: "{{ route('getCompanies') }}",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            _token: CSRF_TOKEN,
                            search: params.term // search term
                        };
                    },
                    processResults: function(data) {
                        return {
                            results: data
                        };
                    },
                    cache: true
                }
            });
        });
    </script>
@endsection
