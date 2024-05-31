@extends('layouts.guest')

@section('content')
    <div class="col-lg-12">


        <div class=" d-block d-md-flex row">

            <div class=" col-md-7 p-0 m-0 ">

                 {{--<div>
                        <h2>{{ __('Sign up') }}</h2>
                        <a href="#" class="btn btn-lg btn-outline-light mt-3">{{ __('Register') }}</a>
                    </div>--}}
                <img src="{{ asset('img/login7.png') }}" alt="" class="card-img-top">

            </div>
            <div class="card col-md-5 mb-0">

                <div class="card-body ">

                    <div class=" col-12  d-flex flex-column align-items-center mb-4 ">
                        <svg  width="150" height="90" style="color: #505abb " >
                            <use xlink:href="{{ asset('icons/cMFyTi01.svg#full') }}"></use>
                        </svg>
                    </div>
                    <h1 style="color: #505abb; font-weight:bold; ">{{ __('Login') }}</h1>

                    {{--@include('layouts.includes.errors')--}}

                    <form action="{{ route('login') }}" method="POST" class="mt-3">
                        @csrf
                        <div class="input-group mb-3">
                            <span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-envelope-open') }}"></use>
                                </svg>
                            </span>
                            <input class="form-control " type="text"
                                name="email" placeholder="{{ __('Username') }}" required autofocus>
                        </div>
                        <div class="input-group mb-4"><span class="input-group-text">
                                <svg class="icon">
                                    <use xlink:href="{{ asset('icons/coreui.svg#cil-lock-locked') }}"></use>
                                </svg></span>
                            <input class="form-control " type="password"
                                name="password" placeholder="{{ __('Password') }}" required>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button class="btn  text-light px-4" style="background-color: #505abb;" type="submit">{{ __('Login') }}</button>
                            </div>
                            @if (Route::has('password.request'))
                                <div class="col-6 text-end">
                                    <a href="{{ route('password.request') }}" class="btn btn-link px-0"
                                        type="button">{{ __('Forgot Your Password?') }}</a>
                                </div>
                            @endif
                        </div>
                    </form>

                    @if(session('error'))
                        <div class="alert alert-danger  mt-4" role="alert">
                            Email or Password is Incorrect
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
@endsection
