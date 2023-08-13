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
                <h6 class="m-0 font-weight-bold text-primary">Edit kendaraan</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.vehicle.update', $vehicle->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Kendaraan</label>
                        <input type="text" name="vehicles_number" value="{{ $vehicle->vehicles_number }}"
                            class="form-control" placeholder="Nomor kendaraan">
                    </div>
                    <div class="form-group">
                        <label for="vecihleType">Tipe Kendaraan</label>
                        <select class="form-control" id="vecihleType" name="type">
                            <option value="">Pilih tipe kendaraan</option>
                            <option value="{{ $vehicle->type }}" selected>
                                @if ($vehicle->type == 0)
                                    Kendaraan Angkutan Orang
                                @elseif ($vehicle->type == 1)
                                    Kendaraan Angkutan Barang
                                @endif
                            </option>
                            <option value="0">Kendaraan Angkutan Orang</option>
                            <option value="1">Kendaraan Angkutan Barang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vehicleOwner">Tipe kepemilikan</label>
                        <select class="form-control" id="vehicleOwner" name="is_company_owned">
                            <option value="{{ $vehicle->is_company_owned }}" selected>
                                @if ($vehicle->is_company_owned == true)
                                    Milik Perusahaan
                                @elseif ($vehicle->is_company_owned == false)
                                    Milik Persewaan
                                @endif
                            </option>
                            <option value="">Pilih tipe kepemilikan</option>
                            <option value="true">Milik Perusahaan</option>
                            <option value="false">Milik Persewaan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mineName">Service schedule</label>
                        <input type="text" class="form-control" value="{{ $vehicle->service_schedule }}"
                            name="service_schedule" id="datepicker">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection
