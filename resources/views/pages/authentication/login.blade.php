@extends('layouts.auth')
@section('content')
    <div class="row">
        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
        <div class="col-lg-6">
            <div class="p-5">
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
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                </div>
                <form class="user" method="post" action="/login/store">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                            aria-describedby="emailHelp" placeholder="Enter Email Address...">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user"
                            id="exampleInputPassword" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Login
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
