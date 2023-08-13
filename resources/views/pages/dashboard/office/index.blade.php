@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                <p>
                    {!! session('success') !!}
                </p>
            </div>
        @endif
        <div class="mb-4">
            <a href="{{ route('dashboard.office.create') }}" class="btn btn-primary">Add Office +</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Office</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Region</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Region</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($offices as $index => $office)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $office->office_name }}</td>
                                    <td>{{ $office->region->region_name }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.office.edit', $office->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('dashboard.office.destroy', $office->id) }}" class="d-inline"
                                            method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                        {{-- <button type="button" class="btn btn-danger">Danger</button> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
