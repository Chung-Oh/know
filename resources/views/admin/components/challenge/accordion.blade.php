<section class="card">
	<div class="card-header btn-cursor" id="heading{{ $accordionName }}" data-toggle="collapse" data-target="#collapse{{ $accordionName }}" aria-expanded="true" aria-controls="collapse{{ $accordionName }}">
		<i class="fas fa-{{ $nameIcon }} icon-challenge text-primary align-middle"></i>
		<h2 class="btn btn-link mb-0">{{ $nameLevel }}</h2>
	</div>
	<div id="collapse{{ $accordionName }}" class="collapse" aria-labelledby="heading{{ $accordionName }}" data-parent="#accordionChallenge">
		<div class="card-body">
			@if ($challenges->where('level_challenge_id', $condition)->isNotEmpty())
				<table class="tablesorter table table-sm table-hover text-center bg-light mb-0">
					<thead class="bg-secondary">
						<tr class="text-white">
							<th class="col-table-order btn-cursor" data-toggle="tooltip" data-placement="top" title="Click the column to sort." scope="col">#<i class="fas fa-sort"></th>
							<th class="col-table-order btn-cursor" data-toggle="tooltip" data-placement="top" title="Click the column to sort." scope="col">{{ __('By') }}<i class="fas fa-sort"></th>
							<th scope="col">{{ __('In') }}</th>
							<th scope="col">{{ __('Options') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($challenges as $c)
							@if ($c->level_challenge_id == $condition)
								<tr>
									<td>{{ $c->id }}</td>
									<td>{{ $c->users[0]->name }}</td>
									<td>{{ $c->created_at }}</td>
									<td>
										<button type="button" class="btn-space btn btn-outline-info btn-sm fas fa-search icon-search" data-toggle="modal" data-target="#formDetailChallenge" data-challenge="{{ $c }}" data-questions="{{ $questions->where('challenge_id', $c->id) }}"></button>
										<button type="button" class="btn-space btn btn-outline-success btn-sm fas fa-pencil-alt" data-toggle="modal" data-target="#formCreateChallenge" data-challenge="{{ $c }}" data-questions="{{ $questions->where('challenge_id', $c->id) }}"></button>
									</td>
								</tr>
							@endif
						@endforeach
					</tbody>
				</table>
			@else
				<div class="alert alert-danger mb-0" role="alert">
					<h5 class="text-font-bold text-center mb-0">{{ __('This level has no challenges') }}</h5>
				</div>
			@endif
		</div>
	</div>
</section>