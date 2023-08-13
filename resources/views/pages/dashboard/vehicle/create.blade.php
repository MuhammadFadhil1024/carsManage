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
                <h6 class="m-0 font-weight-bold text-primary">Add New Vehicle</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.vehicle.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nomor Kendaraan</label>
                        <input type="text" name="vehicles_number" class="form-control" placeholder="Nomor kendaraan">
                    </div>
                    <div class="form-group">
                        <label for="vecihleType">Tipe Kendaraan</label>
                        <select class="form-control" id="vecihleType" name="type">
                            <option value="">Pilih tipe kendaraan</option>
                            <option value="0">Kendaraan Angkutan Orang</option>
                            <option value="1">Kendaraan Angkutan Barang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="vehicleOwner">Kepemilikan kendaraan</label>
                        <select class="form-control" id="vehicleOwner" name="is_company_owned">
                            <option value="">Pilih tipe kepemilikan</option>
                            <option value="true">Milik Perusahaan</option>
                            <option value="false">Milik Persewaan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="mineName">Jadwal service</label>
                        <input type="text" class="form-control" name="service_schedule" id="datepicker">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection
