@extends('layouts.app')

@section('title', 'EuSei – Challenges')

@section('content')

	<!----------------------------- PERFOMANCE RESPONSE ON CHALLENGE ----------------------------->
	@if (session('status'))
		@Alert @endAlert
	@endif

	<section class="container">

        <!----------------------------- A CHALLENGE SUMMARY PANEL CARD ----------------------------->
        @PanelCard
            @slot('title', 'Challenges')
            @slot('body', 'Here will have a some informations about all challenges.')
        @endPanelCard

        <!----------------------------- NAVEGATION TAB ABOUT CHALLENGES ----------------------------->
        @NavegationTabChallenge
        	<!-- Name of the navigation tab -->
			@slot('option_1', 'To do')
			@slot('option_2', 'Done')
			<!-- Variables of business model -->
			@slot('levels', $levels)
			@slot('results', $results)
			@slot('challenges', $challenges)
			@slot('levelChallenge', $levelChallenge)
        @endNavegationTabChallenge

    </section>

    <!----------------------------- SET HEIGHT ON TABLET TO FILL HOLE ----------------------------->
	@Fill
		@slot('number', 50)
	@endFill

@endsection
