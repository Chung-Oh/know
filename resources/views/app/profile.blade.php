@extends('layouts.app')

@section('title', 'EuSei – Profile')

@section('content')

	<!----------------------------- A QUESTION SUMMARY PANEL CARD ----------------------------->
    <section class="container screen-full">

        <!----------------------------- A QUESTION SUMMARY PANEL CARD ----------------------------->
        @PanelCard
            @slot('title', 'Profile')
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