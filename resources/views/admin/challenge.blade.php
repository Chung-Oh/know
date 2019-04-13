@extends('layouts.app')

@section('title', 'EuSei – Challenges')

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
	@FormCreateChallenge
		@slot('categories', $categories)
		@slot('questions', $questions)
		@slot('levelChallenges', $levelChallenges)
	@endFormCreateChallenge

	<!----------------------------- MODAL FORM DETAILS ----------------------------->
	<!----------------------------- MODAL FORM DELETE ----------------------------->

	<!----------------------------- SECTION OF CHALLENGES WHERE YOU CAN CREATE, EDIT, SEE AND REMOVE ----------------------------->
	<section class="container pb-5">
		<!----------------------------- A CHALLENGE SUMMARY PANEL CARD ----------------------------->
		@PanelCardChallenge
			@slot('title', 'Elaboration of Challenges')
			@slot('body', 'Summary here')
		@endPanelCardChallenge

		<!----------------------------- BUTTON TO CREATE QUESTION ----------------------------->
		@ButtonCreate
			@slot('nameModal', 'formChallenge')
			@slot('buttonName', 'New Challenge')
		@endButtonCreate

		<!----------------------------- NAVEGATION TAB ABOUT QUESTIONS ----------------------------->
		<div class="accordion pt-5" id="accordionChallenge">

			<div class="card">
				<div class="card-header btn-cursor" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					<h2 class="btn btn-link mb-0">Beginner Challenges</h2>
				</div>
				<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionChallenge">
					<div class="card-body">
						<table class="table table-sm table-hover text-center bg-light mb-0">
							<thead class="bg-secondary">
								<tr class="text-white">
									<th scope="col">#</th>
									<th scope="col">By</th>
									<th scope="col">In</th>
									<th scope="col">Functions</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1551</td>
									<td>Daniel Chung</td>
									<td>18:09:07 - 08/04/2019</td>
									<td class="d-flex justify-content-center">
										<button type="button" class="btn-space btn btn-outline-info btn-sm fas fa-search icon-search"></button>
										<button type="button" class="btn-space btn btn-outline-success btn-sm fas fa-pencil-alt"></button>
										<button type="button" class="btn-space btn btn-outline-danger btn-sm fas fa-trash-alt"></button>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header btn-cursor" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					<h2 class="btn btn-link mb-0">Intermediate Challenges</button>
					</h2>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionChallenge">
					<div class="card-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header btn-cursor" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					<h2 class="btn btn-link mb-0">Advanced Challenges</h2>
				</div>
				<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionChallenge">
					<div class="card-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</div>

			<div class="card">
				<div class="card-header btn-cursor" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					<h2 class="btn btn-link mb-0">Erudit Challenges</h2>
				</div>
				<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionChallenge">
					<div class="card-body">
						Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
					</div>
				</div>
			</div>
		</div>

	</section>

	<!----------------------------- SET HEIGHT ON TABLET TO FILL HOLE ----------------------------->
	@Fill
		@slot('number', 30)
	@endFill
@endsection