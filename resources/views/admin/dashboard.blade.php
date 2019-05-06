@extends('layouts.app')

@section('title', 'EuSei – Administrator Dashboard')

@section('content')

    <!----------------------------- TOAST OF INFORMATIONS ABOUT CHALLENGES ----------------------------->
    @ToastChallengeAdmin
        @slot('questions', $questions)
    @endToastChallengeAdmin

    <section class="container screen-full">

        <!----------------------------- A QUESTION SUMMARY PANEL CARD ----------------------------->
        @PanelCard
            @slot('title', 'Administrator Dashboard')
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