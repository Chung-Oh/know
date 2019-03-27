@extends('layouts.app')

@section('title', 'EuSei – Perguntas')

@section('content')
<!----------------------------- THIS SECTION USES MODAL AS FORM ----------------------------->
<section>
	<div class="modal fade" id="newQuestion" tabindex="-1" role="dialog" aria-labelledby="newQuestionModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header bg-success">
					<h5 class="modal-title text-white font-weight-bold" id="newQuestionModalLabel">{{ __('New question') }}</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body bg-dark">
					<form action="/questions/new" method="post"> <!-- Criar metodo POST do Formulario -->
						<input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- TOKEN -->
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> <!-- Id user -->
						<div class="form-group d-flex justify-content-center">
						    <select name="category_id" class="form-control btn-cursor" required>
						    	<option value="" selected disabled>{{ __('Choose a Category') }}</option>
						    	<option value="1">Matemática</option>
						    	<option value="2">Geografia</option>
						    	<option value="3">História</option>
						    	<option value="4">Ciência</option>
						    	<option value="5">Português</option>
						    </select>
						    <select name="level_id" class="form-control btn-cursor" required>
						    	<option value="" selected disabled>{{ __('Choose a Level') }}</option>
						    	<option value="1">Beginning</option>
						    	<option value="2">Intermediate</option>
						    	<option value="3">Advanced</option>
						    	<option value="4">Erudit</option>
						    </select>
						</div>
						<div class="form-group">
							<textarea name="question" class="form-control" onfocus="this.value=''" placeholder="{{ __('Question...') }}" required></textarea>
						</div>
						<div class="form-group">
							<input name="alternative_1" type="text" class="form-control text-center" title="{{ ('Maximum of 255 characters') }}" pattern="^([\w\s\dáâãéêíóõôúç].{0,255})" placeholder="{{ __('Alternative 1') }}" onfocus="this.value=''" required>
						</div>
						<div class="form-group">
							<input name="alternative_2" type="text" class="form-control text-center" title="{{ ('Maximum of 255 characters') }}" pattern="^([\w\s\dáâãéêíóõôúç].{0,255})" placeholder="{{ __('Alternative 2') }}" onfocus="this.value=''" required>
						</div>
						<div class="form-group">
							<input name="alternative_3" type="text" class="form-control text-center" title="{{ ('Maximum of 255 characters') }}" pattern="^([\w\s\dáâãéêíóõôúç].{0,255})" placeholder="{{ __('Alternative 3') }}" onfocus="this.value=''" required>
						</div>
						<div class="form-group">
							<input name="alternative_4" type="text" class="form-control text-center" title="{{ ('Maximum of 255 characters') }}" pattern="^([\w\s\dáâãéêíóõôúç].{0,255})" placeholder="{{ __('Alternative 4') }}" onfocus="this.value=''" required>
						</div>
						<div class="form-group">
							<input name="alternative_5" type="text" class="form-control text-center" title="{{ ('Maximum of 255 characters') }}" pattern="^([\w\s\dáâãéêíóõôúç].{0,255})" placeholder="{{ __('Alternative 5') }}" onfocus="this.value=''" required>
						</div>
						<div class="text-center">
							<label class="text-white">{{ __('Alternative correct :') }}</label>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="radioAlternative1" name="radioAlternativeCorrect" class="custom-control-input" value="1" checked>
								<label class="custom-control-label text-white" for="radioAlternative1">1</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="radioAlternative2" name="radioAlternativeCorrect" class="custom-control-input" value="2">
								<label class="custom-control-label text-white" for="radioAlternative2">2</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="radioAlternative3" name="radioAlternativeCorrect" class="custom-control-input" value="3">
								<label class="custom-control-label text-white" for="radioAlternative3">3</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="radioAlternative4" name="radioAlternativeCorrect" class="custom-control-input" value="4">
								<label class="custom-control-label text-white" for="radioAlternative4">4</label>
							</div>
							<div class="custom-control custom-radio custom-control-inline">
								<input type="radio" id="radioAlternative5" name="radioAlternativeCorrect" class="custom-control-input" value="5">
								<label class="custom-control-label text-white" for="radioAlternative5">5</label>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Cancel') }}</button>
							<button type="submit" class="btn btn-primary">{{ __('To Save') }}</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

<!----------------------------- REGISTERED QUESTIONS SECTION WHERE YOU CAN EDIT, VIEW AND REMOVE ----------------------------->
<section class="container pb-5">
	<!----------------------------- A MINI QUESTION SUMMARY PANEL ----------------------------->
	<div class="row justify-content-center pt-5">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Elaboration of Questions') }}</div>
				<div class="card-body">{{ __('Here is a brief summary') }}</div>
			</div>
		</div>
	</div>

	<!----------------------------- BUTTON TO CREATE QUESTION ----------------------------->
	<div class="row d-flex justify-content-center">
		<!----------------------------- This button calls the Modal section above ----------------------------->
		<button type="button" class="btn btn-primary btn-lg btn-block col-11 col-xl-3 mt-2" data-toggle="modal" data-target="#newQuestion" data-whatever="@mdo">{{ __('New question') }}</button>
	</div>

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
							<table class="table table-sm table-hover text-center bg-light mb-0">
								<thead>
									<tr>
										<th scope="col">{{ __('Id') }}</th>
										<th scope="col">{{ __('Question') }}</th>
										<th scope="col">{{ __('Category') }}</th>
										<th scope="col">{{ __('Functions') }}</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Título alguma coisa importante</td>
										<td>Matemática</td>
										<td class="d-flex justify-content-center">
											<button id="detail" type="button" class="btn btn-info btn-sm fas fa-search icon-search"></button>
											<button id="edit" type="button" class="btn btn-warning btn-sm fas fa-pencil-alt"></button>
											<button id="delete" type="button" class="btn btn-danger btn-sm fas fa-trash-alt"></button>
										</td>
									</tr>
								</tbody>
							</table>
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
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
							Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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