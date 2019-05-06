@extends('layouts.app')

@section('title', 'EuSei – Challenges')

@section('content')

	<!----------------------------- PERFOMANCE RESPONSE ON CHALLENGE ----------------------------->
	@if (session('status'))
		@Alert @endAlert
	@endif

	<section class="container"> <!-- Ficar atento com classe SCREEN-FULL, talvez tenha que remover -->

        <!----------------------------- A CHALLENGE SUMMARY PANEL CARD ----------------------------->
        @PanelCard
            @slot('title', 'Challenges')
            @slot('body', 'Here will have a some informations about all challenges.')
        @endPanelCard

        <!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
		@AccordionTabChallenge

		@endAccordionTabChallenge

    </section>

    <!----------------------------- SET HEIGHT ON TABLET TO FILL HOLE ----------------------------->
	@Fill
		@slot('number', 30)
	@endFill

@endsection
