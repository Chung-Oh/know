@extends('layouts.app')

@section('title', 'EuSei – Challenges')

@section('content')

	<!----------------------------- QUESTION MANIPULATION RESPONSE ----------------------------->
	@if (session('status'))
		@Alert @endAlert
	@endif

	<!----------------------------- TOAST OF INFORMATIONS ABOUT CHALLENGES ----------------------------->
	@ToastChallenge
		@slot('questions', $questions)
	@endToastChallenge

	<!----------------------------- ERRORS VALIDATION LIST ----------------------------->
	@if ($errors->any())
		@Errors @endErrors
	@endif

	<!----------------------------- MODAL FORM CREATE ----------------------------->
	@FormCreateChallenge
		@slot('categories', $categories)
		@slot('questions', $questions)
		@slot('levelChallenges', $levelChallenges)
	@endFormCreateChallenge

	<!----------------------------- MODAL FORM DETAILS ----------------------------->
	@FormDetailChallenge
		@slot('categories', $categories)
		@slot('levelChallenges', $levelChallenges)
	@endFormDetailChallenge

	<!----------------------------- SECTION OF CHALLENGES WHERE YOU CAN CREATE, EDIT, SEE AND REMOVE ----------------------------->
	<section class="container pb-5">

		<!----------------------------- A CHALLENGE SUMMARY PANEL CARD ----------------------------->
		@PanelCardChallenge
			@slot('title', 'Elaboration of Challenges')
			@slot('subTitle', 'Click here for see Summary')
			@slot('questions', $questions)
			@slot('levelChallenges', $levelChallenges)
			@slot('challenges', $challenges)
		@endPanelCardChallenge

		<!----------------------------- BUTTON TO CREATE QUESTION ----------------------------->
		@ButtonCreate
			@slot('nameModal', 'formCreateChallenge')
			@slot('buttonName', 'New Challenge')
		@endButtonCreate

		<!----------------------------- NAVEGATION TAB ABOUT QUESTIONS ----------------------------->
		@AccordionTabChallenge
			@slot('questions', $questions)
			@slot('levelChallenges', $levelChallenges)
			@slot('challenges', $challenges)
		@endAccordionTabChallenge

	</section>

	<!----------------------------- SET HEIGHT ON TABLET TO FILL HOLE ----------------------------->
	@Fill
		@slot('number', 30)
	@endFill

@endsection