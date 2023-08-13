@extends('layouts.auth')
@section('content')
    <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
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
                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form class="user" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="name" class="form-control form-control-user" id="exampleLastName"
                            placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="Email Address">
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" name="password" class="form-control form-control-user"
                                id="exampleInputPassword" placeholder="Password">
                        </div>
                        <div class="col-sm-6">
                            <input type="password" name="passwordConfirmation" class="form-control form-control-user"
                                id="exampleRepeatPassword" placeholder="Confirm Password">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Register Account
                    </button>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                </div>
                <div class="text-center">
                    <a class="small" href="login.html">Already have an account? Login!</a>
                </div>
            </div>
        </div>
    </div>
@endsection
