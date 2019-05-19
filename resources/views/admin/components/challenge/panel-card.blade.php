<section class="row justify-content-center pt-5">
	<!-- All questions below for to treat -->
	<p id="questionsPanel" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null) }}" hidden></p>
	<div class="col-md-12">
		<div class="card">
			<div class="card-header font-weight-bold">{{ $title }}</div>
			<div class="card-body pt-0 pb-0 pr-0 pl-0">
				<div class="accordion" id="accordionSummaryQuestion">
					<section class="card rounded-0">
						<div class="card-header btn-cursor pl-1" id="headingSummaryQuestion" data-toggle="collapse" data-target="#collapseSummaryQuestion" aria-expanded="true" aria-controls="collapseSummaryQuestion">
							<i class="fas fa-tasks icon-challenge align-middle text-primary ml-3"></i>
							<h2 class="btn btn-link mb-0">{{ $subTitle }}</h2>
						</div>
						<div id="collapseSummaryQuestion" class="collapse" aria-labelledby="headingSummaryQuestion" data-parent="#accordionSummaryQuestion">
							<div class="card-body container d-flex align-content-around flex-wrap pt-0">
								<!----------------------------- TABLE OF CHALLENGES READY AND MADE ----------------------------->
								@CardChallenge
									@slot('challenges', $challenges)
									@slot('levelChallenges', $levelChallenges)
								@endCardChallenge

								<!----------------------------- TABLE OF QUESTIONS ALMOST READY ----------------------------->
								@CardGraph
									@slot('categories', $categories)
									@slot('questions', $questions)
									@slot('levelChallenges', $levelChallenges)
								@endCardGraph
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</section>