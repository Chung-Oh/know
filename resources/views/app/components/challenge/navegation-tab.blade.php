<!----------------------------- NAVEGATION GUIDE ----------------------------->
<nav class="pt-5">
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		<!-- This option variable was passed to the Tab Nav naming -->
		<a class="nav-item nav-link font-weight-bold active" id="nav-todo-tab" data-toggle="tab" href="#nav-todo" role="tab" aria-controls="nav-todo" aria-selected="true">{{ $option_1 }}</a>
		<a class="nav-item nav-link font-weight-bold" id="nav-done-tab" data-toggle="tab" href="#nav-done" role="tab" aria-controls="nav-done" aria-selected="false">{{ $option_2 }}</a>
	</div>
</nav>

<!----------------------------- CONTENT OF SELECTED QUESTIONS IN THE ABOVE NAVEGATION GUIDE ----------------------------->
<section class="tab-content" id="nav-tabContent">

	<!----------------------------- Waiting List of Questions to Add to a Challenge ----------------------------->
	<div class="tab-pane fade show active" id="nav-todo" role="tabpanel" aria-labelledby="nav-todo-tab">
		<!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
		@AccordionTabChallenge
			<!-- Name of the navigation tab -->
			@slot('name', 'ToDo')
			<!-- Variables of business model -->
			@slot('levels', $levels)
			@slot('results', $results)
			@slot('challenges', $challenges)
			@slot('levelChallenge', $levelChallenge)
		@endAccordionTabChallenge
	</div> <!-- End Tab Panel Waiting -->

	<!----------------------------- List of questions pertaining to a Challenge ----------------------------->
	<div class="tab-pane fade" id="nav-done" role="tabpanel" aria-labelledby="nav-done-tab">
		<!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
		@AccordionTabChallenge
			@slot('name', 'Done')
			@slot('levels', $levels)
			@slot('results', $results)
			@slot('challenges', $challenges)
			@slot('levelChallenge', $levelChallenge)
		@endAccordionTabChallenge
	</div> <!-- End Tab Panel Challenge -->

</section> <!-- End Tab Panel Content -->