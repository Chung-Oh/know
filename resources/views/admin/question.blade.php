@extends('layouts.app')

@section('title', 'EuSei – Questions')

@section('content')
	<!----------------------------- QUESTION MANIPULATION RESPONSE ----------------------------->
	@if (session('status'))
		@Alert @endAlert
	@endif

	<!----------------------------- ERRORS VALIDATION LIST ----------------------------->
	@if ($errors->any())
	    @Errors @endErrors
	@endif

	<!----------------------------- MODAL FORM CREATE ----------------------------->
	@FormCreate
		@slot('categories', $categories)
		@slot('levels', $levels)
	@endFormCreate

<!----------------------------- REGISTERED QUESTIONS SECTION WHERE YOU CAN EDIT, VIEW AND REMOVE ----------------------------->
<section class="container pb-5">
	<!----------------------------- A QUESTION SUMMARY PANEL CARD ----------------------------->
	@PanelCard
		@slot('title', 'Elaboration of Questions')
		@slot('body', 'Here is a brief summary')
	@endPanelCard

	<!----------------------------- BUTTON TO CREATE QUESTION ----------------------------->
	@ButtonCreateQuestion @endButtonCreateQuestion

	<!----------------------------- NAVEGATION TAB ABOUT QUESTIONS ----------------------------->
	<nav class="pt-2">
		<div class="nav nav-tabs" id="nav-tab" role="tablist">
			<a class="nav-item nav-link active" id="nav-waiting-tab" data-toggle="tab" href="#nav-waiting" role="tab" aria-controls="nav-waiting" aria-selected="true">{{ __('Waiting') }}</a>
			<a class="nav-item nav-link" id="nav-question-in-tab" data-toggle="tab" href="#nav-question-in" role="tab" aria-controls="nav-question-in" aria-selected="false">{{ __('In challenge') }}</a>
		</div>
	</nav>

	<!----------------------------- CONTENT OF SELECTED QUESTIONS IN THE ABOVE NAVEGATION GUIDE ----------------------------->
	<div class="tab-content" id="nav-tabContent">
		<!----------------------------- Waiting List of Questions to Add to a Challenge ----------------------------->
		<div class="tab-pane fade show active" id="nav-waiting" role="tabpanel" aria-labelledby="nav-waiting-tab">
			<!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
			<div class="accordion" id="accordionWaiting">

				<!----------------------------- First Beginning level like option ----------------------------->
				<section class="card rounded-0">
					<div class="card-header btn-cursor" id="headingOneWaiting" data-toggle="collapse" data-target="#collapseOneWaiting" aria-expanded="true" aria-controls="collapseOneWaiting">
						<h2 class="btn btn-link mb-0">{{ __('Beginner Level') }}</h2>
					</div>
					<div id="collapseOneWaiting" class="collapse" aria-labelledby="headingOneWaiting" data-parent="#accordionWaiting">
						<div class="card-body container">
							@if ($questions->where('level_id', '1')->isNotEmpty())
								<table class="table table-sm table-hover text-center bg-light mb-0">
									<thead class="bg-secondary">
										<tr class="text-white">
											<th scope="col">{{ __('Id') }}</th>
											<th scope="col">{{ __('Question') }}</th>
											<th scope="col">{{ __('Category') }}</th>
											<th scope="col">{{ __('Functions') }}</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($questions as $q)
											@if ($q->level_id == '1')
												<tr>
													<td>{{ $q->id }}</td>
													<td>{{ strlen($q->content) > 80 ? (substr($q->content, 0, 80) . "...") : ($q->content) }}</td>
													<td>{{ $q->categories[0]->name }}</td>
													<td class="d-flex justify-content-center">
														<button id="detail" type="button" class="btn btn-info btn-sm fas fa-search icon-search"></button>
														<button id="edit" type="button" class="btn btn-warning btn-sm fas fa-pencil-alt"></button>
														<button id="delete" type="button" class="btn btn-danger btn-sm fas fa-trash-alt"></button>
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

				<!----------------------------- Second Intermediate level ----------------------------->
				<section class="card">
					<div class="card-header btn-cursor" id="headingTwoWaiting" data-toggle="collapse" data-target="#collapseTwoWaiting" aria-expanded="false" aria-controls="collapseTwoWaiting">
						<h2 class="btn btn-link collapsed mb-0">{{ __('Intermediate Level') }}</h2>
					</div>
					<div id="collapseTwoWaiting" class="collapse" aria-labelledby="headingTwoWaiting" data-parent="#accordionWaiting">
						<div class="card-body">
							@if ($questions->where('level_id', '2')->isNotEmpty())
								<table class="table table-sm table-hover text-center bg-light mb-0">
									<thead class="bg-secondary">
										<tr class="text-white">
											<th scope="col">{{ __('Id') }}</th>
											<th scope="col">{{ __('Question') }}</th>
											<th scope="col">{{ __('Category') }}</th>
											<th scope="col">{{ __('Functions') }}</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($questions as $q)
											@if ($q->level_id == '2')
												<tr>
													<td>{{ $q->id }}</td>
													<td>{{ strlen($q->content) > 80 ? (substr($q->content, 0, 80) . "...") : ($q->content) }}</td>
													<td>{{ $q->categories[0]->name }}</td>
													<td class="d-flex justify-content-center">
														<button id="detail" type="button" class="btn btn-info btn-sm fas fa-search icon-search"></button>
														<button id="edit" type="button" class="btn btn-warning btn-sm fas fa-pencil-alt"></button>
														<button id="delete" type="button" class="btn btn-danger btn-sm fas fa-trash-alt"></button>
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

				<!----------------------------- Third Advanced level ----------------------------->
				<section class="card">
					<div class="card-header btn-cursor" id="headingThreeWaiting" data-toggle="collapse" data-target="#collapseThreeWaiting" aria-expanded="false" aria-controls="collapseThreeWaiting">
						<h2 class="btn btn-link collapsed mb-0">{{ __('Advanced Level') }}</h2>
					</div>
					<div id="collapseThreeWaiting" class="collapse" aria-labelledby="headingThreeWaiting" data-parent="#accordionWaiting">
						<div class="card-body">
							@if ($questions->where('level_id', '3')->isNotEmpty())
								<table class="table table-sm table-hover text-center bg-light mb-0">
									<thead class="bg-secondary">
										<tr class="text-white">
											<th scope="col">{{ __('Id') }}</th>
											<th scope="col">{{ __('Question') }}</th>
											<th scope="col">{{ __('Category') }}</th>
											<th scope="col">{{ __('Functions') }}</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($questions as $q)
											@if ($q->level_id == '3')
												<tr>
													<td>{{ $q->id }}</td>
													<td>{{ strlen($q->content) > 80 ? (substr($q->content, 0, 80) . "...") : ($q->content) }}</td>
													<td>{{ $q->categories[0]->name }}</td>
													<td class="d-flex justify-content-center">
														<button id="detail" type="button" class="btn btn-info btn-sm fas fa-search icon-search"></button>
														<button id="edit" type="button" class="btn btn-warning btn-sm fas fa-pencil-alt"></button>
														<button id="delete" type="button" class="btn btn-danger btn-sm fas fa-trash-alt"></button>
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

				<!----------------------------- Fourth Erudit level ----------------------------->
				<section class="card">
					<div class="card-header btn-cursor" id="headingFourWaiting" data-toggle="collapse" data-target="#collapseFourWaiting" aria-expanded="false" aria-controls="collapseFourWaiting">
						<h2 class="btn btn-link collapsed mb-0">{{ __('Erudit Level') }}</h2>
					</div>
					<div id="collapseFourWaiting" class="collapse" aria-labelledby="headingFourWaiting" data-parent="#accordionWaiting">
						<div class="card-body">
							@if ($questions->where('level_id', '4')->isNotEmpty())
								<table class="table table-sm table-hover text-center bg-light mb-0">
									<thead class="bg-secondary">
										<tr class="text-white">
											<th scope="col">{{ __('Id') }}</th>
											<th scope="col">{{ __('Question') }}</th>
											<th scope="col">{{ __('Category') }}</th>
											<th scope="col">{{ __('Functions') }}</th>
										</tr>
									</thead>
									<tbody>
										@foreach ($questions as $q)
											@if ($q->level_id == '4')
												<tr>
													<td>{{ $q->id }}</td>
													<td>{{ strlen($q->content) > 80 ? (substr($q->content, 0, 80) . "...") : ($q->content) }}</td>
													<td>{{ $q->categories[0]->name }}</td>
													<td class="d-flex justify-content-center">
														<button id="detail" type="button" class="btn btn-info btn-sm fas fa-search icon-search"></button>
														<button id="edit" type="button" class="btn btn-warning btn-sm fas fa-pencil-alt"></button>
														<button id="delete" type="button" class="btn btn-danger btn-sm fas fa-trash-alt"></button>
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
			</div> <!-- End Accordion -->
		</div> <!-- End Tab Pane Waiting -->

<!------------------------------------------------------------------------------------------------------------------------------------------------------------------>
		<!----------------------------- List of questions pertaining to a Challenge ----------------------------->
		<div class="tab-pane fade" id="nav-question-in" role="tabpanel" aria-labelledby="nav-question-in-tab">
			<!----------------------------- USING ACCORDION TO SEPARATE LEVELS ----------------------------->
			<div class="accordion" id="accordionChallenge">

				<!----------------------------- First Beginning level like option ----------------------------->
				<section class="card rounded-0">
					<div class="card-header btn-cursor" id="headingOneChallenge" data-toggle="collapse" data-target="#collapseOneChallenge" aria-expanded="true" aria-controls="collapseOneChallenge">
						<h2 class="btn btn-link mb-0">{{ __('Beginner Level') }}</h2>
					</div>
					<div id="collapseOneChallenge" class="collapse" aria-labelledby="headingOneChallenge" data-parent="#accordionChallenge">
						<div class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						</div>
					</div>
				</section>

				<!----------------------------- Second Intermediate level ----------------------------->
				<section class="card">
					<div class="card-header btn-cursor" id="headingTwoChallenge" data-toggle="collapse" data-target="#collapseTwoChallenge" aria-expanded="false" aria-controls="collapseTwoChallenge">
						<h2 class="btn btn-link collapsed mb-0">{{ __('Intermediate Level') }}</h2>
					</div>
					<div id="collapseTwoChallenge" class="collapse" aria-labelledby="headingTwoChallenge" data-parent="#accordionChallenge">
						<div class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						</div>
					</div>
				</section>

				<!----------------------------- Third Advanced level ----------------------------->
				<section class="card">
					<div class="card-header btn-cursor" id="headingThreeChallenge" data-toggle="collapse" data-target="#collapseThreeChallenge" aria-expanded="false" aria-controls="collapseThreeChallenge">
						<h2 class="btn btn-link collapsed mb-0">{{ __('Advanced Level') }}</h2>
					</div>
					<div id="collapseThreeChallenge" class="collapse" aria-labelledby="headingThreeChallenge" data-parent="#accordionChallenge">
						<div class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						</div>
					</div>
				</section>

				<!----------------------------- Fourth Erudit level ----------------------------->
				<section class="card">
					<div class="card-header btn-cursor" id="headingFourChallenge" data-toggle="collapse" data-target="#collapseFourChallenge" aria-expanded="false" aria-controls="collapseFourChallenge">
						<h2 class="btn btn-link collapsed mb-0">{{ __('Erudit Level') }}</h2>
					</div>
					<div id="collapseFourChallenge" class="collapse" aria-labelledby="headingFourChallenge" data-parent="#accordionChallenge">
						<div class="card-body">
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
						</div>
					</div>
				</section>
			</div> <!-- End Accordion -->
		</div> <!-- End Tab Pane Challenge -->
	</div> <!-- End Tab Pane Content -->
</section>
@endsection