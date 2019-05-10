<!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
<div class="accordion" id="accordion{{ $name }}">

	<!----------------------------- First Beginning Level like option ----------------------------->
	@AccordionChallenge
		<!-- Variables bellow is required in the Accordion components -->
		@slot('name', $name)
		@slot('accordionName', 'One' . $name) <!-- Attribute name in tag -->
		@slot('condition', 1) <!-- Condition to know if wait or challenge -->
		@slot('nameLevel', 'Beginner Challenges') <!-- Name in the element in the view -->
		@slot('border', 'rounded-0') <!-- Bootstrap class to handle border of accordion -->
		<!-- Icons name used on the cards of challenges -->
		@slot('iconChallenge', 'book-open') <!-- Name of icon to show in the accordion -->
		@slot('iconOpportunity', 'four') <!-- Name of icon of challenge card -->
		@slot('iconClock', 'fas fa-hourglass') <!-- Name of icon of challenge card -->
		@slot('iconStar', 'far fa-star-half') <!-- Name of icon of challenge card -->
		<!-- Variables of business model -->
		@slot('levels', $levels)
		@slot('results', $results)
		@slot('challenges', $challenges)
		@slot('levelChallenge', $levelChallenge)
	@endAccordionChallenge

	<!----------------------------- Second Intermediate Level ----------------------------->
	@AccordionChallenge
		@slot('name', $name)
		@slot('accordionName', 'Two' . $name)
		@slot('condition', 2)
		@slot('nameLevel', 'Intermediate Challenges')
		@slot('border', 'rounded-0')
		@slot('iconChallenge', 'book-reader')
		@slot('iconOpportunity', 'three')
		@slot('iconClock', 'fas fa-hourglass-start')
		@slot('iconStar', 'fas fa-star-half')
		@slot('levels', $levels)
		@slot('results', $results)
		@slot('challenges', $challenges)
		@slot('levelChallenge', $levelChallenge)
	@endAccordionChallenge

	<!----------------------------- Third Advanced Level ----------------------------->
	@AccordionChallenge
		@slot('name', $name)
		@slot('accordionName', 'Three' . $name)
		@slot('condition', 3)
		@slot('nameLevel', 'Advanced Challenges')
		@slot('border', 'rounded-0')
		@slot('iconChallenge', 'graduation-cap')
		@slot('iconOpportunity', 'two')
		@slot('iconClock', 'fas fa-hourglass-half')
		@slot('iconStar', 'fas fa-star-half-alt')
		@slot('levels', $levels)
		@slot('results', $results)
		@slot('challenges', $challenges)
		@slot('levelChallenge', $levelChallenge)
	@endAccordionChallenge

	<!----------------------------- Fourth Erudit Level ----------------------------->
	@AccordionChallenge
		@slot('name', $name)
		@slot('accordionName', 'Four' . $name)
		@slot('condition', 4)
		@slot('nameLevel', 'Erudit Challenges')
		@slot('border', 'rounded-bottom')
		@slot('iconChallenge', 'brain')
		@slot('iconOpportunity', 'one')
		@slot('iconClock', 'fas fa-hourglass-end')
		@slot('iconStar', 'fas fa-star')
		@slot('levels', $levels)
		@slot('results', $results)
		@slot('challenges', $challenges)
		@slot('levelChallenge', $levelChallenge)
	@endAccordionChallenge

</div> <!-- End Accordion -->