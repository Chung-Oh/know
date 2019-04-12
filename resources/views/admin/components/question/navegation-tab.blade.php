<!----------------------------- NAVEGATION GUIDE ----------------------------->
<nav class="pt-2">
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		<!-- This option variable was passed to the Tab Nav naming -->
		<a class="nav-item nav-link font-weight-bold active" id="nav-waiting-tab" data-toggle="tab" href="#nav-waiting" role="tab" aria-controls="nav-waiting" aria-selected="true">{{ $option_1 }}</a>
		<a class="nav-item nav-link font-weight-bold" id="nav-question-in-tab" data-toggle="tab" href="#nav-question-in" role="tab" aria-controls="nav-question-in" aria-selected="false">{{ $option_2 }}</a>
	</div>
</nav>

<!----------------------------- CONTENT OF SELECTED QUESTIONS IN THE ABOVE NAVEGATION GUIDE ----------------------------->
<section class="tab-content" id="nav-tabContent">
	<!----------------------------- Waiting List of Questions to Add to a Challenge ----------------------------->
	<div class="tab-pane fade show active" id="nav-waiting" role="tabpanel" aria-labelledby="nav-waiting-tab">
		@AccordionTabQuestion
			@slot('name', 'Waiting') <!-- Attribute name in tag -->
			@slot('condition', FALSE) <!-- Condition to know if wait or challenge -->
			<!-- Bellow, getting past variables from the Question file, and moving on to the next component -->
			@slot('questions', $questions)
			@slot('alternatives', $alternatives)
		@endAccordionTabQuestion
	</div> <!-- End Tab Pane Waiting -->

	<!----------------------------- List of questions pertaining to a Challenge ----------------------------->
	<div class="tab-pane fade" id="nav-question-in" role="tabpanel" aria-labelledby="nav-question-in-tab">
		@AccordionTabQuestion
			@slot('name', 'Challenge')
			@slot('condition', TRUE)
			@slot('questions', $questions)
			@slot('alternatives', $alternatives)
		@endAccordionTabQuestion
	</div> <!-- End Tab Panel Challenge -->
</section> <!-- End Tab Panel Content -->