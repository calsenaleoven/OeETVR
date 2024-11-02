@extends('layouts.app')

@section('content')
<div class="container mt-5 py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header text-center font-weight-bold">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success text-center" role="alert">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p class="text-center">{{ __('Please check your email for a verification link before proceeding.') }}</p>
                    <p class="text-center">{{ __('If you did not receive the email, you can request a new one below.') }}</p>

                    <form class="text-center mt-3" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Click here to request another verification link') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection