<!----------------------------- NAVEGATION GUIDE ----------------------------->
<nav class="pt-2">
	<div class="nav nav-tabs" id="nav-tab" role="tablist">
		<a class="nav-item nav-link active" id="nav-waiting-tab" data-toggle="tab" href="#nav-waiting" role="tab" aria-controls="nav-waiting" aria-selected="true">{{ $option_1 }}</a>
		<a class="nav-item nav-link" id="nav-question-in-tab" data-toggle="tab" href="#nav-question-in" role="tab" aria-controls="nav-question-in" aria-selected="false">{{ $option_2 }}</a>
	</div>
</nav>

<!----------------------------- CONTENT OF SELECTED QUESTIONS IN THE ABOVE NAVEGATION GUIDE ----------------------------->
<div class="tab-content" id="nav-tabContent">
	<!----------------------------- Waiting List of Questions to Add to a Challenge ----------------------------->
	<div class="tab-pane fade show active" id="nav-waiting" role="tabpanel" aria-labelledby="nav-waiting-tab">
		@QuestionAccordionTab
			@slot('name', 'Waiting')
			@slot('questions', $questions)
			@slot('alternatives', $alternatives)
		@endQuestionAccordionTab
	</div> <!-- End Tab Pane Waiting -->

<!------------------------------------------------------------------------------------------------------------------------------------>
	<!----------------------------- List of questions pertaining to a Challenge ----------------------------->
	<div class="tab-pane fade" id="nav-question-in" role="tabpanel" aria-labelledby="nav-question-in-tab">
		<!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
		<div class="accordion" id="accordionChallenge">

			<!----------------------------- First Beginning level like option ----------------------------->
			<section class="card rounded-0">
				<div class="card-header btn-cursor" id="headingOneChallenge" data-toggle="collapse" data-target="#collapseOneChallenge" aria-expanded="true" aria-controls="collapseOneChallenge">
					<h2 class="btn btn-link mb-0">{{ __('Beginner Level') }}</h2>
				</div>
				<div id="collapseOneChallenge" class="collapse" aria-labelledby="headingOneChallenge" data-parent="#accordionChallenge">
					<div class="card-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</section>

			<!----------------------------- Second Intermediate level ----------------------------->
			<section class="card">
				<div class="card-header btn-cursor" id="headingTwoChallenge" data-toggle="collapse" data-target="#collapseTwoChallenge" aria-expanded="false" aria-controls="collapseTwoChallenge">
					<h2 class="btn btn-link collapsed mb-0">{{ __('Intermediate Level') }}</h2>
				</div>
				<div id="collapseTwoChallenge" class="collapse" aria-labelledby="headingTwoChallenge" data-parent="#accordionChallenge">
					<div class="card-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</section>

			<!----------------------------- Third Advanced level ----------------------------->
			<section class="card">
				<div class="card-header btn-cursor" id="headingThreeChallenge" data-toggle="collapse" data-target="#collapseThreeChallenge" aria-expanded="false" aria-controls="collapseThreeChallenge">
					<h2 class="btn btn-link collapsed mb-0">{{ __('Advanced Level') }}</h2>
				</div>
				<div id="collapseThreeChallenge" class="collapse" aria-labelledby="headingThreeChallenge" data-parent="#accordionChallenge">
					<div class="card-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</section>

			<!----------------------------- Fourth Erudit level ----------------------------->
			<section class="card">
				<div class="card-header btn-cursor" id="headingFourChallenge" data-toggle="collapse" data-target="#collapseFourChallenge" aria-expanded="false" aria-controls="collapseFourChallenge">
					<h2 class="btn btn-link collapsed mb-0">{{ __('Erudit Level') }}</h2>
				</div>
				<div id="collapseFourChallenge" class="collapse" aria-labelledby="headingFourChallenge" data-parent="#accordionChallenge">
					<div class="card-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</section>
		</div> <!-- End Accordion -->
	</div> <!-- End Tab Panel Challenge -->
</div> <!-- End Tab Panel Content -->