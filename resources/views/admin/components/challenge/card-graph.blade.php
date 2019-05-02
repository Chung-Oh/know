<section class="col-12 col-md-8 col-lg-8 col-xl-8 pt-4 pr-1 pl-1">
	<div class="card text-center"> <!-- All questions bellow for to treat -->
		<p id="questionGraph" data-questions="{{ $questions->where('type', 1)->where('challenge_id', null) }}" hidden></p>
		<div class="card-header bg-secondary text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Green circles are questions created to form a challenge, Wait status.">{{ __('Questions') }}
			<!-- Warning when the device has a lower display -->
			<span class="text-warning" hidden>{{ __('- Scroll to vertical to see more') }}</span></div>
		<div class="card-body table-responsive pt-0 pr-0 pl-0 pb-0">
			<table class="table table-sm table-md-10 table-hover mb-0">
				<thead>
					<tr class="bg-light">
						<th>{{ __('Category') }}</th>
						@foreach ($levelChallenges as $l)
							<th>{{ $l->levels[0]->name }}</th>
						@endforeach
					</tr>
				</thead>
				<tbody>
					@foreach ($categories as $c)
						<tr>
							<td>{{ $c->name }}</td>
							<td class="beginner"><span class="dot mr-2 align-middle bg-secondary"></span><span class="dot align-middle bg-secondary"></span></td>
							<td class="intermediate"><span class="dot mr-2 align-middle bg-secondary"></span><span class="dot align-middle bg-secondary"></span></td>
							<td class="advanced"><span class="dot mr-2 align-middle bg-secondary"></span><span class="dot align-middle bg-secondary"></span></td>
							<td class="erudit"><span class="dot mr-2 align-middle bg-secondary"></span><span class="dot align-middle bg-secondary"></span></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</section>