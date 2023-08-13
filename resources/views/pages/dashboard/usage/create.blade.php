@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        @if (session()->has('failed'))
            <div class="alert alert-danger" role="alert">
                <p>
                    {!! session('failed') !!}
                </p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <p>
                <ul>
                    @foreach ($errors->all() as $eror)
                        <li>{{ $eror }}</li>
                    @endforeach
                </ul>
                </p>
            </div>
        @endif
        <div class="card mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Pesanan Baru</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.usage.store') }}" method="post">
                    @csrf
                    {{-- <div class="form-group">
                        <label for="exampleFormControlInput1">Nama driver</label>
                        <input type="text" name="driver" class="form-control" placeholder="Nama driver">
                    </div> --}}
                    <div class="form-group">
                        <label for="">Pengemudi</label>
                        <select class="form-control" id="vecihleType" name="driver_id">
                            <option value="">Pilih Pengumudi</option>
                            @foreach ($drivers as $driver)
                                <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vecihleType">Kendaraan</label>
                        <select class="form-control" id="vecihleType" name="vechile_id">
                            <option value="">Pilih Kendaraan</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}">{{ $vehicle->vehicles_number }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="headOffice">Pihak kepala Kantor</label>
                        <select class="form-control" id="headOffice" name="headOffice_id">
                            <option value="">Pilih Pihak Kepala Kantor</option>
                            @foreach ($headOffices as $headOffice)
                                <option value="{{ $headOffice->id }}">{{ $headOffice->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vecihleType">Pihak kepala Tambang</label>
                        <select class="form-control" id="vecihleType" name="headMine_id">
                            <option value="">Pilih Pihak kepala Tambang</option>
                            @foreach ($headMines as $headMine)
                                <option value="{{ $headMine->id }}">{{ $headMine->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mineName">Tanggal peminjaman</label>
                        <input type="text" class="form-control" name="usage_date" id="datepicker">
                    </div>
                    <div class="form-group">
                        <label for="mineName">Tanggal pengembalian</label>
                        <input type="text" class="form-control" name="end_of_usage_date" id="datepicker2">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Konsumsi Bahan Bakar</label>
                        <input type="text" name="fuel_consumption" class="form-control"
                            placeholder="Tuliskan angka saja">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection
