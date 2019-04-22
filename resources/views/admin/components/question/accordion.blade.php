<section class="card rounded-0">
	<div class="card-header btn-cursor" id="heading{{ $accordionName }}" data-toggle="collapse" data-target="#collapse{{ $accordionName }}" aria-expanded="true" aria-controls="collapse{{ $accordionName }}">
		<h2 class="btn btn-link mb-0">{{ $nameLevel }}</h2>
	</div>
	<div id="collapse{{ $accordionName }}" class="collapse" aria-labelledby="heading{{ $accordionName }}" data-parent="#accordion{{ $name }}">
		<div class="card-body">
			@if ($questions->where('challenge_id', $condition)->where('level_id', $idLevel)->isNotEmpty()
				&& $questions->where('type', TRUE)->isNotEmpty())
				<table class="tablesorter table table-sm table-hover text-center bg-light mb-0">
					<thead class="bg-secondary">
						<tr class="text-white">
							<th scope="col" class="col-table-order btn-cursor">#<i class="fas fa-sort"></i></th>
							<th scope="col" class="col-table-order btn-cursor">{{ __('Question') }}<i class="fas fa-sort"></i></th>
							<th scope="col" class="col-table-order btn-cursor">{{ __('Category') }}<i class="fas fa-sort"></i></th>
							<th scope="col">{{ __('Options') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($questions as $q) <!-- Type true for Admin and false for Contribute -->
							<!-- Variable condition was passed by slot, where it is true for questions that have a challenge and null for not ones that do not have -->
							@if ($q->level_id == $idLevel && $q->type == true && $q->challenge_id == $condition)
								<tr class="row-question">
									<td>{{ $q->id }}</td>
									<td>{{ strlen($q->content) > 80 ? (substr($q->content, 0, 80) . "...") : ($q->content) }}</td>
									<td>{{ $q->categories[0]->name }}</td>
									<td>
										<button type="button" class="btn btn-outline-info btn-sm fas fa-search icon-search" data-toggle="modal" data-target="#formDetailQuestion" data-question="{{ $q }}" data-alt1="{{ $alternatives->where('question_id', $q->id)->splice(0,1) }}" data-alt2="{{ $alternatives->where('question_id', $q->id)->splice(1,1) }}" data-alt3="{{ $alternatives->where('question_id', $q->id)->splice(2,1) }}" data-alt4="{{ $alternatives->where('question_id', $q->id)->splice(3,1) }}" data-alt5="{{ $alternatives->where('question_id', $q->id)->splice(4,1) }}"></button>
										<button type="button" class="btn btn-outline-success btn-sm fas fa-pencil-alt" data-toggle="modal" data-target="#formCreateQuestion" data-question="{{ $q }}" data-alt1="{{ $alternatives->where('question_id', $q->id)->splice(0,1) }}" data-alt2="{{ $alternatives->where('question_id', $q->id)->splice(1,1) }}" data-alt3="{{ $alternatives->where('question_id', $q->id)->splice(2,1) }}" data-alt4="{{ $alternatives->where('question_id', $q->id)->splice(3,1) }}" data-alt5="{{ $alternatives->where('question_id', $q->id)->splice(4,1) }}"></button>
										<button type="button" class="btn btn-outline-danger btn-sm fas fa-trash-alt" data-toggle="modal" data-target="#formDeleteQuestion" data-question="{{ $q }}"></button>
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