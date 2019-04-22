<!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
<div class="accordion pt-5" id="accordionChallenge">

	<!-- Putting Level Challenge object in paragraphy element to treat on Modal -->
	<p id="levelChallenge" data-level-challenge="{{ $levelChallenges }}" hidden></p>

	<!----------------------------- First Beginning Level like option ----------------------------->
	@AccordionChallenge
		@slot('accordionName', 'One') <!-- Attribute name in tag -->
		@slot('condition', 1) <!-- Condition to know if wait or challenge -->
		@slot('nameLevel', 'Beginner Challenges') <!-- Name in the element in the view -->
		@slot('questions', $questions) <!-- Passing of variable in parameter to work in Accordion component -->
		@slot('challenges', $challenges) <!-- To work in Challenge component -->
	@endAccordionChallenge

	<!----------------------------- Second Intermediate Level ----------------------------->
	@AccordionChallenge
		@slot('accordionName', 'Two')
		@slot('condition', 2)
		@slot('nameLevel', 'Intermediate Challenges')
		@slot('questions', $questions)
		@slot('challenges', $challenges)
	@endAccordionChallenge

	<!----------------------------- Third Advanced Level ----------------------------->
	@AccordionChallenge
		@slot('accordionName', 'Three')
		@slot('condition', 3)
		@slot('nameLevel', 'Advanced Challenges')
		@slot('questions', $questions)
		@slot('challenges', $challenges)
	@endAccordionChallenge

	<!----------------------------- Fourth Erudit Level ----------------------------->
	@AccordionChallenge
		@slot('accordionName', 'Four')
		@slot('condition', 4)
		@slot('nameLevel', 'Erudit Challenges')
		@slot('questions', $questions)
		@slot('challenges', $challenges)
	@endAccordionChallenge

</div> <!-- End Accordion -->