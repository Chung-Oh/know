@foreach ($categories as $c)
	<section class="col-12 col-md-6 col-lg-6 col-xl-4 pt-4 pr-1 pl-1">
		<div class="card text-center">
			<div class="card-header bg-secondary text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Contribution column means that questions are created by users. In order to use them, you must accept in the Feedback page.">{{ $c->name }}</div>
			<div class="card-body pt-0 pr-0 pl-0 pb-0">
				<table class="table table-sm table-md-10 table-hover mb-0">
					<thead>
						<tr class="bg-light">
							<th>{{ __('Level') }}</th>
							<th>{{ __('Wait') }}</th>
							<th>{{ __('Challenge') }}</th>
							<th>{{ __('Contribution') }}</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($levels as $l)
						<tr>
							<td>{{ $l->name }}</td>
							<td class="{{ $l->name }}Wait">{{ count($questions->where('category_id', $c->id)->where('level_id', $l->id)->where('challenge_id', null)->where('type', true)) }}</td>
							<td>{{ count($questions->where('category_id', $c->id)->where('level_id', $l->id)->where('challenge_id', !null)) }}</td>
							<td class="{{ $l->name }}Contribute">{{ count($questions->where('category_id', $c->id)->where('level_id', $l->id)->where('type', false)) }}</td>
						</tr>
						@endforeach
						<tr class="bg-light font-weight-bold">
							<td>Total</td>
							<td>{{ count($questions->where('category_id', $c->id)->where('challenge_id', null)->where('type', 1)) }}</td>
							<td>{{ count($questions->where('category_id', $c->id)->where('challenge_id', !null)) }}</td>
							<td>{{ count($questions->where('category_id', $c->id)->where('type', 0)) }}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</section>
@endforeach