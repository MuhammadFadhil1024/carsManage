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
            <a href="{{ route('dashboard.vehicle.create') }}" class="btn btn-primary">Tambah Kendaraan +</a>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data Kendaraan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Type</th>
                                <th>Status Kendaraan</th>
                                <th>Nomor kendaraan</th>
                                <th>Service schedule</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Type</th>
                                <th>Status Kendaraan</th>
                                <th>Nomor kendaraan</th>
                                <th>Service schedule</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($vehicles as $index => $vehicle)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if ($vehicle->type == 0)
                                            Kendaraan Angkutan Orang
                                        @elseif ($vehicle->type == 1)
                                            Kendaraan Angkutan Barang
                                        @endif
                                    </td>
                                    <td>
                                        @if ($vehicle->is_company_owned == true)
                                            Milik Perusahaan
                                        @elseif ($vehicle->is_company_owned == false)
                                            Milik Persewaan
                                        @endif
                                    </td>
                                    <td>{{ $vehicle->vehicles_number }}</td>
                                    <td>{{ $vehicle->service_schedule }}</td>
                                    <td>
                                        <a href="{{ route('dashboard.vehicle.edit', $vehicle->id) }}"
                                            class="btn btn-warning">Edit</a>
                                        <form action="{{ route('dashboard.vehicle.destroy', $vehicle->id) }}"
                                            class="d-inline" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
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
