<section>
	<!----------------------------- MESSAGE TO PORTRAIT DEVICE ----------------------------->
	<div id="infoLand" class="container mt-3" hidden>
		<div class="alert alert-warning mb-0" role="alert">
			<h6 class="text-center mb-0">{{ __('To see more information change to landscape.') }}</h6>
		</div>
	</div>
	<div id="infoColumn" class="container mt-3" hidden>
		<div class="alert alert-warning mb-0" role="alert">
			<h6 class="text-center mb-0">{{ __('Click on the columns to sort.') }}</h6>
		</div>
	</div>
	<!----------------------------- HERE IS INPUT TO SEARCH QUESTION ----------------------------->
	<div class="d-flex justify-content-center">
		<div class="input-group col-lg-6 col-xl-6 mt-3 mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="inputGroup-sizing-default">
					<i class="fas fa-search"></i>
				</span>
			</div>
			<input id="searchQuestion" type="text" class="form-control" aria-label="Search questions" aria-describedby="inputGroup-sizing-default" placeholder="Content question...">
			<button id="search" class="btn-primary rounded-right px-3" type="button">{{ __('Go') }}</button>
		</div>
	</div>
	<!----------------------------- BELLOW IS SEARCH RESULTS ----------------------------->
	<div>
		<table id="tbSearch" class="tablesorter table table-sm table-hover text-center bg-light mb-0" hidden>
			<thead class="bg-secondary">
				<tr class="text-white">
					<th class="col-table-order btn-cursor" data-toggle="tooltip" data-placement="top" title="Click the column to sort." scope="col">#<i class="sort-icon fas fa-sort"></i></th>
					<th class="col-table-order btn-cursor" data-toggle="tooltip" data-placement="top" title="Click the column to sort." scope="col">{{ __('Question') }}<i class="sort-icon fas fa-sort"></i></th>
					<th class="col-table-order btn-cursor" data-toggle="tooltip" data-placement="top" title="Click the column to sort." scope="col">{{ __('Category') }}<i class="sort-icon fas fa-sort"></i></th>
					<th class="col-table-order more-info btn-cursor" data-toggle="tooltip" data-placement="top" title="Click the column to sort." scope="col">{{ __('Level') }}<i class="sort-icon fas fa-sort"></i></th>
					<th class="col-table-order more-info btn-cursor" data-toggle="tooltip" data-placement="top" title="Click the column to sort." scope="col">{{ __('Challenge') }}<i class="sort-icon fas fa-sort"></i></th>
					<th scope="col">{{ __('Options') }}</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
	<!----------------------------- MESSAGE NOT FOUND ----------------------------->
	<div id="noResult" class="container pt-3" hidden>
		<h5 class="alert alert-danger text-center font-italic mb-0" role="alert">{{ __('Question not a found.') }}</h5>
	</div>
	<!----------------------------- SET HEIGHT ON TABLET TO FILL HOLE ----------------------------->
	@Fill
		@slot('number', 17.5)
	@endFill
</section>