@extends('layouts.app')

@section('title', 'EuSei – Questions')

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
	@FormCreateQuestion
		@slot('categories', $categories)
		@slot('levels', $levels)
		@slot('type', true) <!-- Inform here to know if is created by Admin or Contribution -->
	@endFormCreateQuestion

	<!----------------------------- MODAL FORM DETAILS ----------------------------->
	@FormDetailQuestion	@endFormDetailQuestion

	<!----------------------------- MODAL FORM DELETE ----------------------------->
	@FormDeleteQuestion	@endFormDeleteQuestion

	<!------------------- SECTION OF QUESTIONS WHERE YOU CAN CREATE, EDIT, DISPLAY AND REMOVE ------------------->
	<section class="container pb-5">

		<!----------------------------- A QUESTION SUMMARY PANEL CARD ----------------------------->
		@PanelCardQuestion
			@slot('title', 'Elaboration of Questions')
			@slot('subTitle', 'Click here for see Summary')
			@slot('questions', $questions)
			@slot('categories', $categories)
			@slot('levels', $levels)
		@endPanelCardQuestion

		<!----------------------------- BUTTON TO CREATE QUESTION ----------------------------->
		@ButtonCreate
			@slot('nameModal', 'formCreateQuestion')
			@slot('buttonName', 'New Question')
		@endButtonCreate

		<!----------------------------- NAVEGATION TAB ABOUT QUESTIONS ----------------------------->
		@NavegationTabQuestion
			@slot('option_1', 'Wait')
			@slot('option_2', 'Challenge')
			@slot('questions', $questions)
			@slot('alternatives', $alternatives)
		@endNavegationTabQuestion

	</section>

	<!----------------------------- SET HEIGHT ON TABLET TO FILL HOLE ----------------------------->
	@Fill
		@slot('number', 30)
	@endFill

@endsection