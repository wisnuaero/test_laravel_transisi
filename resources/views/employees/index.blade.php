@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2 class="text-center">List Data Employee</a></h2>
        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body table-responsive">
                        <div class="text-right" style="text-align: right">
                            <a href="{{ route('employees.export') }}" class="btn btn-danger mb-3" target="_blank">Export
                                PDF</a>
                            <a href="{{ route('employees.create') }}" class="btn btn-md btn-primary mb-3">Tambah Data</a>
                        </div>
                        <table class="table table-bordered" id="tableKu">
                            <thead>
                                <tr>
                                    <th class="text-center">NAMA</th>
                                    <th class="text-center">EMAIL</th>
                                    <th class="text-center">COMPANY</th>
                                    <th class="text-center">CREATED AT</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($employees as $data)
                                    <tr>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->get_company->nama }}</td>
                                        <td class="text-center">{{ date('Y-m-d', strtotime($data->created_at)) }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('employees.destroy', $data->id) }}" method="POST">
                                                <a href="{{ route('employees.show', $data->id) }}"
                                                    class="btn btn-sm btn-info text-white">
                                                    Detail</a>
                                                <a href="{{ route('employees.edit', $data->id) }}"
                                                    class="btn btn-sm btn-warning text-white"> Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fa-solid fa-trash-can"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Company data is empty!
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $employees->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
