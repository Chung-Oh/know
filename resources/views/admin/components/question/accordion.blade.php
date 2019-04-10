<section class="card rounded-0">
	<div class="card-header btn-cursor" id="heading{{ $idAccordion }}" data-toggle="collapse" data-target="#collapse{{ $collapseAccordion }}" aria-expanded="true" aria-controls="collapse{{ $collapseAccordion }}">
		<h2 class="btn btn-link mb-0">{{ $nameLevel }}</h2>
	</div>
	<div id="collapse{{ $collapseAccordion }}" class="collapse" aria-labelledby="heading{{ $idAccordion }}" data-parent="#accordion{{ $name }}">
		<div class="card-body container">
			@if ($questions->where('level_id', $idLevel)->isNotEmpty())
				<table class="table table-sm table-hover text-center bg-light mb-0">
					<thead class="bg-secondary">
						<tr class="text-white">
							<th scope="col">#</th>
							<th scope="col">{{ __('Question') }}</th>
							<th scope="col">{{ __('Category') }}</th>
							<th scope="col">{{ __('Functions') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($questions as $q) <!-- Type true for Admin and false for Contribute -->
							@if ($q->level_id == $idLevel && $q->type == true)
								<tr>
									<td>{{ $q->id }}</td>
									<td>{{ strlen($q->content) > 80 ? (substr($q->content, 0, 80) . "...") : ($q->content) }}</td>
									<td>{{ $q->categories[0]->name }}</td>
									<td class="d-flex justify-content-center">
										<button type="button" class="btn btn-info btn-sm fas fa-search icon-search" data-toggle="modal" data-target="#formDetail" data-question="{{ $q }}" data-alt1="{{ $alternatives->where('question_id', $q->id)->splice(0,1) }}" data-alt2="{{ $alternatives->where('question_id', $q->id)->splice(1,1) }}" data-alt3="{{ $alternatives->where('question_id', $q->id)->splice(2,1) }}" data-alt4="{{ $alternatives->where('question_id', $q->id)->splice(3,1) }}" data-alt5="{{ $alternatives->where('question_id', $q->id)->splice(4,1) }}"></button>
										<button type="button" class="btn btn-warning btn-sm fas fa-pencil-alt" data-toggle="modal" data-target="#formQuestion" data-question="{{ $q }}" data-alt1="{{ $alternatives->where('question_id', $q->id)->splice(0,1) }}" data-alt2="{{ $alternatives->where('question_id', $q->id)->splice(1,1) }}" data-alt3="{{ $alternatives->where('question_id', $q->id)->splice(2,1) }}" data-alt4="{{ $alternatives->where('question_id', $q->id)->splice(3,1) }}" data-alt5="{{ $alternatives->where('question_id', $q->id)->splice(4,1) }}"></button>
										<button type="button" class="btn btn-danger btn-sm fas fa-trash-alt" data-toggle="modal" data-target="#formDelete" data-question="{{ $q }}"></button>
									</td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			@else
				<div class="alert alert-danger mb-0" role="alert">
					<h5 class="text-font-bold text-center mb-0">{{ __('This level has no questions') }}</h5>
				</div>
			@endif
		</div>
	</div>
</section>