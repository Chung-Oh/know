<div class="col-md-4 pt-4 pr-1 pl-1">
	<div class="card text-center">
		<div class="card-header bg-success text-white font-weight-bold">{{ __('Ready') }}</div>
		<div class="card-body pt-0 pr-0 pl-0 pb-0">
			<table class="table table-sm table-md-10 table-hover mb-0">
				<thead>
					<tr class="bg-light">
						<th>Level</th>
						<th>Challenge</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($levels as $l)
						<tr>
							<td>{{ $l->name }}</td>
							<td id="{{ $l->name }}Ready" class="text-success font-weight-bold"></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>