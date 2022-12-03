@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2 class="text-center">Import User Data</a></h2>
        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
                <button class="close" data-dismiss='alert'>X</button>
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body table-responsive">
                        <div class="mb-2" style="text-align: right">
                            <button type="button" class="btn btn-success " data-toggle="modal" data-target="#importExcel">
                                Import Excel
                            </button>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">NAMA</th>
                                    <th class="text-center">EMAIL</th>
                                    <th class="text-center">PASSWORD HASH</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $data)
                                    <tr>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->password }}</td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        User data is empty!
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Import Excel --}}
    <!-- Import Excel -->
    <div class="modal fade" id="importExcel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" action="/import-excels" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Import Excel</h5>
                    </div>
                    <div class="modal-body">

                        {{ csrf_field() }}

                        <label>Pilih file excel</label>
                        <div class="form-group">
                            <input type="file" name="file" required="required">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Import</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        //! message with toastr libraries
        @if (session()->has('success'))
            toastr.success('{{ session('success') }}', 'SUCCESSS!');
        @elseif (session()->has('error'))
            toastr.error('{{ session('error') }}', 'ERROR!');
            s
        @endif
    </script>
@endsection
