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
        @if (session()->has('failed'))
            <div class="alert alert-danger" role="alert">
                <p>
                    {!! session('failed') !!}
                </p>
            </div>
        @endif

        <!-- DataTales Example -->
        {{-- <a href="/dashboard/monitor/exports"></a> --}}
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Report data penggunaan kendaraan</h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col d-flex align-items-center">
                        <a href="/dashboard/monitor/exports" class="btn btn-success mb-2 mr-2">Exports seluruh data ke
                            excel</a>
                        <form action="/dashboard/monitor/exportyear" method="get" class="d-flex">
                            <select class="form-control" name="year">
                                <option value="">Select By year</option>
                                @foreach ($year as $year)
                                    <option value="{{ $year->year }}">{{ $year->year }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary ml-1">Submit</button>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    {{-- <table class="table table-bordered" id="datatable" width="100%" cellspacing="0"> --}}
                    @include('pages.dashboard.monitor.partials.report')
                </div>
            </div>
        </div>

    </div>
@endsection
