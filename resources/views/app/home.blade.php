@extends('layouts.app')

@section('title', 'EuSei – Home')

@section('content')

    <section class="container screen-full"> <!-- Ficar atento com classe SCREEN-FULL, talvez tenha que remover -->

        <!----------------------------- A QUESTION SUMMARY PANEL CARD ----------------------------->
        @PanelCard
            @slot('title', 'Home')
            @slot('body')
                @if (session('status'))
                    <div class="alert text-center alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                    <p class="mb-0">{{ __('You are logged in') }} <span class="font-weight-bold">{{ Auth::user()->name }}</span>!</p>
            @endslot
        @endPanelCard

    </section>

@endsection
