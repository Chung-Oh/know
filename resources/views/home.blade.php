@extends('layouts.app')

@section('title', 'EuSei – Início')

@section('content')
<div class="container screen-auth">
    <div class="row justify-content-center pt-5">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
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
</div>
@endsection
