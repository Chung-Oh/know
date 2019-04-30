<section class="col-12 col-md-6 col-lg-6 col-xl-4 pt-4 pr-1 pl-1">
	<div class="card text-center">
		<div class="card-header bg-success text-white font-weight-bold" data-toggle="tooltip" data-placement="top" title="Ready column means you can already create a Challenge">{{ __('Ready') }}</div>
		<div class="card-body pt-0 pr-0 pl-0 pb-0">
			<table class="table table-sm table-md-10 table-hover mb-0">
				<thead>
					<tr class="bg-light">
						<th>{{ __('Level') }}</th>
						<th>{{ __('Challenge') }}</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($levels as $l)
						<tr>
							<td>{{ $l->name }}</td>
							<td id="{{ $l->name }}Ready" class="text-success font-weight-bold"></td>
						</tr>
					@endforeach
					<tr class="bg-light font-weight-bold">
						<td>Total</td>
						<td id="totalReady"></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</section>