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

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Data boking kendaraan</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kendaraan</th>
                                <th>Driver</th>
                                <th>Kepala tambang</th>
                                <th>Kepala kantor</th>
                                <th>Tanggal pinjam</th>
                                <th>Tanggal kembali</th>
                                <th>Bahan bakar</th>
                                @if (Auth::user()->roles == 'headOffice' || Auth::user()->roles == 'headMine')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kendaraan</th>
                                <th>Driver</th>
                                <th>Kepala tambang</th>
                                <th>Kepala kantor</th>
                                <th>Tanggal pinjam</th>
                                <th>Tanggal kembali</th>
                                <th>Bahan bakar</th>
                                @if (Auth::user()->roles == 'headOffice' || Auth::user()->roles == 'headMine')
                                    <th>Action</th>
                                @endif
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($usages as $index => $usage)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $usage->vehicle->vehicles_number }}</td>
                                    <td>{{ $usage->driver->name }}</td>
                                    <td>
                                        @if ($usage->approved_by_head_mine == 1)
                                            <span class="badge badge-success p-2">Setuju</span>
                                        @elseif ($usage->approved_by_head_mine == 0)
                                            <span class="badge badge-warning p-2">Menunggu</span>
                                        @elseif ($usage->approved_by_head_mine == 2)
                                            <span class="badge badge-danger p-2">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($usage->approved_by_head_office == 1)
                                            <span class="badge badge-success p-2">Setuju</span>
                                        @elseif ($usage->approved_by_head_office == 0)
                                            <span class="badge badge-warning p-2">Menunggu</span>
                                        @elseif ($usage->approved_by_head_office == 0)
                                            <span class="badge badge-danger p-2">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>{{ $usage->usage_date }}</td>
                                    <td>{{ $usage->end_of_usage_date }}</td>
                                    <td>{{ $usage->fuel_consumption }} Liter</td>
                                    @if (Auth::user()->roles == 'headOffice' || Auth::user()->roles == 'headMine')
                                        <td>
                                            <a href="/dashboard/monitor/edit/{{ $usage->id }}"
                                                class="btn btn-warning">Edit</a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
