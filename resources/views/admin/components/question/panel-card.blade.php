<section class="row justify-content-center pt-5">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">{{ $title }}</div>
			<div class="card-body pt-0 pb-0 pr-0 pl-0">
				<div class="accordion" id="accordionSummaryQuestion">
					<section class="card rounded-0">
						<div class="card-header btn-cursor pl-1" id="headingSummaryQuestion" data-toggle="collapse" data-target="#collapseSummaryQuestion" aria-expanded="true" aria-controls="collapseSummaryQuestion">
							<h2 class="btn btn-link mb-0">{{ $subTitle }}</h2>
						</div>
						<div id="collapseSummaryQuestion" class="collapse" aria-labelledby="headingSummaryQuestion" data-parent="#accordionSummaryQuestion">
							<div class="card-body container d-flex align-content-around flex-wrap pt-0">
								@foreach ($categories as $c)
								<div class="col-md-4 pt-4 pr-1 pl-1">
									<div class="card text-center">
										<div class="card-header bg-secondary text-white font-weight-bold">{{ $c->name }}</div>
										<div class="card-body pt-0 pr-0 pl-0 pb-0">
											<table class="table table-sm table-md-10 table-hover mb-0">
												<thead>
													<tr class="bg-light">
														<th>Level</th>
														<th>Wait</th>
														<th>Challenge</th>
													</tr>
												</thead>
												<tbody>
													@foreach ($levels as $l)
													<tr>
														<td>{{ $l->name }}</td>
														<td>{{ count($questions->where('category_id', $c->id)->where('level_id', $l->id)->where('challenge_id', null)) }}</td>
														<td>{{ count($questions->where('category_id', $c->id)->where('level_id', $l->id)->where('challenge_id', !null)) }}</td>
													</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
								@endforeach
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</section>