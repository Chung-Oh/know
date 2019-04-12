<!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
<div class="accordion" id="accordion{{ $name }}">

	<!----------------------------- First Beginning Level like option ----------------------------->
	@AccordionQuestion
		@slot('name', $name)
		@slot('condition', $condition) <!-- Condition to know if wait or challenge -->
		@slot('idAccordion', 'One' . $name) <!-- Attribute name in tag -->
		@slot('collapseAccordion', 'One' . $name) <!-- Attribute name in tag -->
		@slot('nameLevel', 'Beginner Questions') <!-- Name in the element in the view -->
		@slot('idLevel', '1') <!-- Level id pass in parameter, where it will be used in the loop -->
		@slot('questions', $questions) <!-- Passing of variable in parameter to work in another component -->
		@slot('alternatives', $alternatives) <!-- Passing of variable in parameter to work in another component -->
	@endAccordionQuestion

	<!----------------------------- Second Intermediate Level ----------------------------->
	@AccordionQuestion
		@slot('name', $name)
		@slot('condition', $condition)
		@slot('idAccordion', 'Two' . $name)
		@slot('collapseAccordion', 'Two' . $name)
		@slot('nameLevel', 'Intermediate Questions')
		@slot('idLevel', '2')
		@slot('questions', $questions)
		@slot('alternatives', $alternatives)
	@endAccordionQuestion

	<!----------------------------- Third Advanced Level ----------------------------->
	@AccordionQuestion
		@slot('name', $name)
		@slot('condition', $condition)
		@slot('idAccordion', 'Three' . $name)
		@slot('collapseAccordion', 'Three' . $name)
		@slot('nameLevel', 'Advanced Questions')
		@slot('idLevel', '3')
		@slot('questions', $questions)
		@slot('alternatives', $alternatives)
	@endAccordionQuestion

	<!----------------------------- Fourth Erudit Level ----------------------------->
	@AccordionQuestion
		@slot('name', $name)
		@slot('condition', $condition)
		@slot('idAccordion', 'Four' . $name)
		@slot('collapseAccordion', 'Four' . $name)
		@slot('nameLevel', 'Erudit Questions')
		@slot('idLevel', '4')
		@slot('questions', $questions)
		@slot('alternatives', $alternatives)
	@endAccordionQuestion

</div> <!-- End Accordion -->