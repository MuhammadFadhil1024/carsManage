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
            <a href="{{ route('dashboard.region.create') }}" class="btn btn-primary">Add Regions +</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Regions</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($regions as $index => $region)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $region->region_name }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.region.edit', $region->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('dashboard.region.destroy', $region->id) }}" class="d-inline"
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
