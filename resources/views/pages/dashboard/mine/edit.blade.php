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
                <h6 class="m-0 font-weight-bold text-primary">Add New mine</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.mine.update', $mine->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="exampleFormControlInput1">mine name</label>
                        <input type="text" name="mine_name" value="{{ $mine->mine_name }}" class="form-control"
                            placeholder="New mine">
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="region_id">
                            <label>Region name</label>
                            <option value="">Select Region</option>
                            @foreach ($regions as $region)
                                <option value="{{ $region->id }}" {{ $mine->region_id == $region->id ? 'selected' : '' }}>
                                    {{ $region->region_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Submit</button>
                </form>
            </div>
        </div>


    </div>
@endsection
