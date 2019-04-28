@extends('layouts.app')

@section('title', 'EuSei – Verificação Usuário')

@section('content')

    <section class="container screen-full">
        <div class="row justify-content-center pt-5">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h1>{{ __('Verify Your Email Address') }}</h1>
                    </div>
                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                <p class="text-center mb-0">{{ __('A fresh verification link has been sent to your email address.') }}</p>
                            </div>
                        @endif
                        <div>
                            <p>{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                            <p>{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here') }}</a> {{ __('to request another.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
