<section class="row justify-content-center pt-5">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header font-weight-bold">{{ $title }}</div>
			<div class="card-body pt-0 pb-0 pr-0 pl-0">
				<div class="accordion" id="accordionSummaryQuestion">
					<section class="card rounded-0">
						<div class="card-header btn-cursor pl-1" id="headingSummaryQuestion" data-toggle="collapse" data-target="#collapseSummaryQuestion" aria-expanded="true" aria-controls="collapseSummaryQuestion">
							<h2 class="btn btn-link mb-0">{{ $subTitle }}</h2>
						</div>
						<div id="collapseSummaryQuestion" class="collapse" aria-labelledby="headingSummaryQuestion" data-parent="#accordionSummaryQuestion">
							<div class="card-body container d-flex align-content-around flex-wrap pt-0">
								<!-- Create all cards of all categories -->
								@CardQuestion
									@slot('levels', $levels)
									@slot('categories', $categories)
									@slot('questions', $questions)
								@endCardQuestion

								<!-- Card bellow showing challenges ready to create -->
								@CardReadyQuestion
									@slot('levels', $levels)
								@endCardReadyQuestion
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</section>