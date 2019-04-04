<!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
<div class="accordion" id="accordion{{ $name }}">

	<!----------------------------- First Beginning Level like option ----------------------------->
	@QuestionAccordion
		@slot('name', $name)
		@slot('idAccordion', 'One' . $name)
		@slot('collapseAccordion', 'One' . $name)
		@slot('nameLevel', 'Beginner Level')
		@slot('idLevel', '1')
		@slot('questions', $questions)
		@slot('alternatives', $alternatives)
	@endQuestionAccordion

	<!----------------------------- Second Intermediate Level ----------------------------->
	@QuestionAccordion
		@slot('name', $name)
		@slot('idAccordion', 'Two' . $name)
		@slot('collapseAccordion', 'Two' . $name)
		@slot('nameLevel', 'Intermediate Level')
		@slot('idLevel', '2')
		@slot('questions', $questions)
		@slot('alternatives', $alternatives)
	@endQuestionAccordion

	<!----------------------------- Third Advanced Level ----------------------------->
	@QuestionAccordion
		@slot('name', $name)
		@slot('idAccordion', 'Three' . $name)
		@slot('collapseAccordion', 'Three' . $name)
		@slot('nameLevel', 'Advanced Level')
		@slot('idLevel', '3')
		@slot('questions', $questions)
		@slot('alternatives', $alternatives)
	@endQuestionAccordion

	<!----------------------------- Fourth Erudit Level ----------------------------->
	@QuestionAccordion
		@slot('name', $name)
		@slot('idAccordion', 'Four' . $name)
		@slot('collapseAccordion', 'Four' . $name)
		@slot('nameLevel', 'Erudit Level')
		@slot('idLevel', '4')
		@slot('questions', $questions)
		@slot('alternatives', $alternatives)
	@endQuestionAccordion

</div> <!-- End Accordion -->