<section class="row justify-content-center pt-5">
	<!-- All questions bellow for to treat -->
	<p id="questions" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null) }}" hidden></p>
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
								<div class="col-md-4 pt-4 pr-1 pl-1">
									<div class="card text-center">
										<div class="card-header bg-secondary text-white font-weight-bold">{{ __('Challenges') }}</div>
										<div class="card-body pt-0 pr-0 pl-0 pb-0">
											<table class="table table-sm table-md-10 table-hover mb-0">
												<thead>
													<tr class="bg-light">
														<th>Level</th>
														<th>Ready</th>
														<th>Done</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($levelChallenges as $l)
														<tr>
															<td>{{ $l->levels[0]->name }}</td>
															<td id="{{ $l->levels[0]->name }}" class="text-success font-weight-bold"></td>
															<td>{{ count($challenges->where('level_challenge_id', $l->id)) }}</td>
														</tr>
													@endforeach
													<tr class="bg-light font-weight-bold">
														<td>Total</td>
														<td id="totalReady"></td>
														<td>{{ count($challenges) }}</td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</section>