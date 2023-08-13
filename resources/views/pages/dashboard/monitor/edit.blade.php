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
                <h6 class="m-0 font-weight-bold text-primary">Update Persetujuan</h6>
            </div>
            <div class="card-body">
                @if (Auth::user()->id == $usage->headOffice_id)
                    <form action="/dashboard/monitor/update/headOffice/{{ $usage->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Persetujuan kepala Kantor</label>
                            <select class="form-control" name="approved_by_head_office">
                                <option value="">Pilih persetujuan</option>
                                <option value="{{ $usage->approved_by_head_office }}" selected>
                                    @if ($usage->approved_by_head_office == 0)
                                        Menunggu
                                    @elseif ($usage->approved_by_head_office == 1)
                                        Setuju
                                    @elseif ($usage->approved_by_head_office == 2)
                                        Ditolak
                                    @endif
                                </option>
                                <option value="0">Menunggu</option>
                                <option value="1">Setuju</option>
                                <option value="2">Ditolak</option>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                @elseif(Auth::user()->id == $usage->headMine_id)
                    <form action="/dashboard/monitor/update/headMine/{{ $usage->id }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label>Persetujuan kepala tambang</label>
                            <select class="form-control" name="approved_by_head_mine">
                                <option value="">Pilih persetujuan</option>
                                <option value="{{ $usage->approved_by_head_mine }}" selected>
                                    @if ($usage->approved_by_head_mine == 0)
                                        Menunggu
                                    @elseif ($usage->approved_by_head_mine == 1)
                                        Setuju
                                    @elseif ($usage->approved_by_head_mine == 2)
                                        Ditolak
                                    @endif
                                </option>
                                <option value="0">Menunggu</option>
                                <option value="1">Setuju</option>
                                <option value="2">Ditolak</option>

                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Submit</button>
                    </form>
                @endif
            </div>
        </div>


    </div>
@endsection
