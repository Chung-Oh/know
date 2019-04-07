<!----------------------------- NAVEGATION GUIDE ----------------------------->
<nav class="pt-2">
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		<a class="nav-item nav-link active" id="nav-waiting-tab" data-toggle="tab" href="#nav-waiting" role="tab" aria-controls="nav-waiting" aria-selected="true">{{ $option_1 }}</a>
		<a class="nav-item nav-link" id="nav-question-in-tab" data-toggle="tab" href="#nav-question-in" role="tab" aria-controls="nav-question-in" aria-selected="false">{{ $option_2 }}</a>
	</div>
</nav>

<!----------------------------- CONTENT OF SELECTED QUESTIONS IN THE ABOVE NAVEGATION GUIDE ----------------------------->
<section class="tab-content" id="nav-tabContent">
	<!----------------------------- Waiting List of Questions to Add to a Challenge ----------------------------->
	<div class="tab-pane fade show active" id="nav-waiting" role="tabpanel" aria-labelledby="nav-waiting-tab">
		@QuestionAccordionTab
			@slot('name', 'Waiting')
			@slot('questions', $questions)
			@slot('alternatives', $alternatives)
		@endQuestionAccordionTab
	</div> <!-- End Tab Pane Waiting -->

	<!----------------------------- List of questions pertaining to a Challenge ----------------------------->
	<div class="tab-pane fade" id="nav-question-in" role="tabpanel" aria-labelledby="nav-question-in-tab">
		@QuestionAccordionTab
			@slot('name', 'Challenge')
			@slot('questions', $questions)
			@slot('alternatives', $alternatives)
		@endQuestionAccordionTab
	</div> <!-- End Tab Panel Challenge -->
</section> <!-- End Tab Panel Content -->