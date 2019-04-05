@extends('layouts.app')

@section('title', 'EuSei – Questions')

@section('content')
	<!----------------------------- QUESTION MANIPULATION RESPONSE ----------------------------->
	@if (session('status'))
		@Alert @endAlert
	@endif

	<!----------------------------- ERRORS VALIDATION LIST ----------------------------->
	@if ($errors->any())
	    @Errors @endErrors
	@endif

	<!----------------------------- MODAL FORM CREATE ----------------------------->
	@FormCreateQuestion
		@slot('categories', $categories)
		@slot('levels', $levels)
	@endFormCreateQuestion

	<!----------------------------- MODAL FORM DETAILS ----------------------------->
	@FormDetailQuestion	@endFormDetailQuestion

<!----------------------------- REGISTERED QUESTIONS SECTION WHERE YOU CAN EDIT, VIEW AND REMOVE ----------------------------->
<section class="container pb-5">
	<!----------------------------- A QUESTION SUMMARY PANEL CARD ----------------------------->
	@PanelCard
		@slot('title', 'Elaboration of Questions')
		@slot('body', 'Here is a brief summary')
	@endPanelCard

	<!----------------------------- BUTTON TO CREATE QUESTION ----------------------------->
	@ButtonCreateQuestion @endButtonCreateQuestion

	<!----------------------------- NAVEGATION TAB ABOUT QUESTIONS ----------------------------->
	@QuestionNavegationTab
		@slot('option_1', 'Waiting')
		@slot('option_2', 'In challenge')
		@slot('questions', $questions)
		@slot('alternatives', $alternatives)
	@endQuestionNavegationTab
</section>
@endsection