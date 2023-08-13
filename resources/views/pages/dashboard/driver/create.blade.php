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
                <h6 class="m-0 font-weight-bold text-primary">Tambah pengemudi</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.driver.store') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Nama</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Lengkap">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput2">Nomor sim</label>
                        <input type="text" name="license_number" class="form-control" placeholder="Nomor Sim">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput3">alamat</label>
                        <input type="text" name="address" class="form-control" placeholder="Alamat">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput4">Nomor telpon</label>
                        <input type="text" name="phone_number" class="form-control" placeholder="Nomor Telpon">
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection
