@extends('layouts.app')

@section('title', 'EuSei – Painel Administrador')

@section('content')
<section class="container screen-full">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Administrator Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert text-center alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <p class="mb-0">You are logged in <span class="font-weight-bold">{{ Auth::user()->name }}</span>!</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection