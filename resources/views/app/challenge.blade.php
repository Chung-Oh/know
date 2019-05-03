@extends('layouts.app')

@section('title', 'EuSei – Challenges')

@section('content')

	<!----------------------------- PERFOMANCE RESPONSE ON CHALLENGE ----------------------------->
	@if (session('status'))
		@Alert @endAlert
	@endif

	<section class="container screen-full"> <!-- Ficar atento com classe SCREEN-FULL, talvez tenha que remover -->

        <!----------------------------- A CHALLENGE SUMMARY PANEL CARD ----------------------------->
        @PanelCard
            @slot('title', 'Challenges')
            @slot('body', 'Here will have a some informations about all challenges.')
        @endPanelCard

        <!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
		<div class="accordion" id="accordionName">

			<!----------------------------- First Beginning Level like option ----------------------------->

			<!----------------------------- Second Intermediate Level ----------------------------->

			<!----------------------------- Third Advanced Level ----------------------------->

			<!----------------------------- Fourth Erudit Level ----------------------------->

		</div> <!-- End Accordion -->

    </section>

@endsection
