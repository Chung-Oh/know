<!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
<div class="accordion pt-5" id="accordionChallenge">

	<!-- Putting Level Challenge object in paragraphy element to treat on Modal -->
	<p id="levelChallenge" data-level-challenge="{{ $levelChallenges }}" hidden></p>

	<!----------------------------- First Beginning Level like option ----------------------------->
	@AccordionChallengeAdmin
		@slot('accordionName', 'One') <!-- Attribute name in tag -->
		@slot('condition', 1) <!-- Condition to know if wait or challenge -->
		@slot('nameIcon', 'book-open') <!-- Name of icon -->
		@slot('nameLevel', 'Beginner Challenges') <!-- Name in the element in the view -->
		<!-- Variables below is required in the Accordion (table) and Forms (Creation / Editing and Detail) components -->
		@slot('questions', $questions)
		@slot('challenges', $challenges)
	@endAccordionChallengeAdmin

	<!----------------------------- Second Intermediate Level ----------------------------->
	@AccordionChallengeAdmin
		@slot('accordionName', 'Two')
		@slot('condition', 2)
		@slot('nameIcon', 'book-reader')
		@slot('nameLevel', 'Intermediate Challenges')
		@slot('questions', $questions)
		@slot('challenges', $challenges)
	@endAccordionChallengeAdmin

	<!----------------------------- Third Advanced Level ----------------------------->
	@AccordionChallengeAdmin
		@slot('accordionName', 'Three')
		@slot('condition', 3)
		@slot('nameIcon', 'graduation-cap')
		@slot('nameLevel', 'Advanced Challenges')
		@slot('questions', $questions)
		@slot('challenges', $challenges)
	@endAccordionChallengeAdmin

	<!----------------------------- Fourth Erudit Level ----------------------------->
	@AccordionChallengeAdmin
		@slot('accordionName', 'Four')
		@slot('condition', 4)
		@slot('nameIcon', 'brain')
		@slot('nameLevel', 'Erudit Challenges')
		@slot('questions', $questions)
		@slot('challenges', $challenges)
	@endAccordionChallengeAdmin

</div> <!-- End Accordion -->