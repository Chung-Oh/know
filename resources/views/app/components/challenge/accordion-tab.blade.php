<!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
<div class="accordion pt-5" id="accordionChallenge">

	<!----------------------------- First Beginning Level like option ----------------------------->
	@AccordionChallenge
		@slot('accordionName', 'One') <!-- Attribute name in tag -->
		@slot('condition', 1) <!-- Condition to know if wait or challenge -->
		@slot('nameLevel', 'Beginner Challenges') <!-- Name in the element in the view -->
		<!-- Variables bellow is required in the Accordion components -->
		@slot('nameIcon', 'book-open')
	@endAccordionChallenge

	<!----------------------------- Second Intermediate Level ----------------------------->
	@AccordionChallenge
		@slot('accordionName', 'Two')
		@slot('condition', 2)
		@slot('nameLevel', 'Intermediate Challenges')
		@slot('nameIcon', 'book-reader')
	@endAccordionChallenge

	<!----------------------------- Third Advanced Level ----------------------------->
	@AccordionChallenge
		@slot('accordionName', 'Three')
		@slot('condition', 3)
		@slot('nameLevel', 'Advanced Challenges')
		@slot('nameIcon', 'graduation-cap')
	@endAccordionChallenge

	<!----------------------------- Fourth Erudit Level ----------------------------->
	@AccordionChallenge
		@slot('accordionName', 'Four')
		@slot('condition', 4)
		@slot('nameLevel', 'Erudit Challenges')
		@slot('nameIcon', 'brain')
	@endAccordionChallenge

</div> <!-- End Accordion -->