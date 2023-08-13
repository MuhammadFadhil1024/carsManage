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
                <h6 class="m-0 font-weight-bold text-primary">Edit Pemesanan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.usage.update', $usage->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    {{-- <div class="form-group">
                        <label for="exampleFormControlInput1">Nama driver</label>
                        <input type="text" name="driver" value="{{ $usage->driver->name }}" class="form-control"
                            placeholder="Nama driver">
                    </div> --}}
                    <div class="form-group">
                        <label for="vecihleType">Pengemudi</label>
                        <select class="form-control" id="vecihleType" name="driver_id">
                            <option value="">Pilih Pengemudi</option>
                            @foreach ($drivers as $driver)
                                <option value="{{ $usage->driver_id }}" selected>{{ $usage->driver->name }}</option>
                                <option value="{{ $driver->id }}">
                                    {{ $driver->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vecihleType">Kendaraan</label>
                        <select class="form-control" id="vecihleType" name="vechile_id">
                            <option value="">Pilih Kendaraan</option>
                            @foreach ($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}"
                                    {{ $vehicle->id == $usage->vechile_id ? 'selected' : '' }}>
                                    {{ $vehicle->vehicles_number }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vecihleType">Pihak Kepala Kantor</label>
                        <select class="form-control" id="vecihleType" name="headOffice_id">
                            <option value="">Pihak kepala Kantor</option>
                            @foreach ($headOffices as $headOffice)
                                <option value="{{ $headOffice->id }}"
                                    {{ $headOffice->id == $usage->headOffice_id ? 'selected' : '' }}>
                                    {{ $headOffice->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vecihleType">Pihak Kepala Tambang</label>
                        <select class="form-control" id="vecihleType" name="headMine_id">
                            <option value="">Pilih Pihak kepala Tambang</option>
                            @foreach ($headMines as $headMine)
                                <option value="{{ $headMine->id }}"
                                    {{ $headMine->id == $usage->headMine_id ? 'selected' : '' }}>
                                    {{ $headMine->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mineName">Tanggal peminjaman</label>
                        <input type="text" value="{{ $usage->usage_date }}" class="form-control" name="usage_date"
                            id="datepicker">
                    </div>
                    <div class="form-group">
                        <label for="mineName">Tanggal pengembalian</label>
                        <input type="text" value="{{ $usage->end_of_usage_date }}" class="form-control"
                            name="end_of_usage_date" id="datepicker2">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Konsumsi Bahan Bakar</label>
                        <input type="text" value="{{ $usage->fuel_consumption }}" name="fuel_consumption"
                            class="form-control" placeholder="Tuliskan angka saja">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection
