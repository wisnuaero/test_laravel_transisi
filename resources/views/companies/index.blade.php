@extends('layouts.dashboard')
@section('content')
    <div class="container">
        <h2 class="text-center">List Data Company</a></h2>
        @if (session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body table-responsive">
                        <div style="text-align: right">
                            <a href="{{ route('companies.create') }}" class="btn btn-primary mb-3"> Tambah Data</a>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">LOGO</th>
                                    <th class="text-center">NAMA</th>
                                    <th class="text-center">EMAIL</th>
                                    <th class="text-center">WEBSITE</th>
                                    <th class="text-center">CREATED AT</th>
                                    <th class="text-center">ACTION</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($companies as $data)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ url('storage/app/company/' . $data->logo) }}" class="rounded"
                                                style="width: 150px">
                                        </td>
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->website }}</td>
                                        <td class="text-center">{{ date('Y-m-d', strtotime($data->created_at)) }}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('companies.destroy', $data->id) }}" method="POST">
                                                <a href="{{ route('companies.show', $data->id) }}"
                                                    class="btn btn-sm btn-info text-white"><i
                                                        class="fa-solid fa-circle-info"></i>
                                                    Detail</a>
                                                <a href="{{ route('companies.edit', $data->id) }}"
                                                    class="btn btn-sm btn-warning text-white"><i
                                                        class="fa-solid fa-pen-to-square"></i> Edit</a>
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
                        {{ $companies->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
