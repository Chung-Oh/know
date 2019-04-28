<section class="col-12 col-md-4 col-lg-4 col-xl-4 pt-4 pr-1 pl-1">
	<div class="card text-center">
		<div class="card-header bg-secondary text-white font-weight-bold">{{ __('Challenges') }}</div>
		<div class="card-body pt-0 pr-0 pl-0 pb-0">
			<table class="table table-sm table-md-10 table-hover mb-0">
				<thead>
					<tr class="bg-light">
						<th>{{ __('Level') }}</th>
						<th>{{ __('Ready') }}</th>
						<th>{{ __('Done') }}</th>
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
</section>