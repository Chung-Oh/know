@extends('layouts.app')

@section('title', 'EuSei – Profile')

@section('content')

    <section class="container screen-full"> <!-- Ficar atento com classe SCREEN-FULL, talvez tenha que remover -->

        <!----------------------------- A PROFILE SUMMARY PANEL CARD ----------------------------->
        @PanelCard
            @slot('title', 'Profile')
            @slot('body', 'Here will have a all informations about perfomance about user')
        @endPanelCard

    </section>

@endsection