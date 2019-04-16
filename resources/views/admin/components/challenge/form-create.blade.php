<!----------------------------- THIS SECTION USES MODAL AS FORM CREATE ----------------------------->
<section id="formChallenge" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="formChallengeModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 id="formChallengeModalLabel" class="modal-title text-light font-weight-bold">New Challenge</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body bg-dark">
				<!-- Put message about action when modify Route and file JS -->
				<form action="{{ action('Admin\ChallengeController@create') }}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- TOKEN -->
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> <!-- ID User -->
					<input id="idChallenge" type="hidden" name="id_challenge" value=""> <!-- ID Question -->
					<div class="form-group d-flex justify-content-center text-center mb-0 row">
						<select id="levelChallengeId" name="level_challenge_id" class="form-control btn-cursor float-left col-5 col-xl-3 mb-3 mr-1 ml-1" required>
							<option value="" selected disabled>{{ __('Choose a Level') }}</option>
							@foreach ($levelChallenges as $l)
								<option value="{{ $l->id }}" data-level-challenge="{{ $l }}" data-questions="{{ $questions->where('level_id', $l->id)->where('challenge_id', NULL) }}">{{ $l->levels[0]->name }}</option>
							@endforeach
						</select>
						<p id="times" class="form-control info-form-challenge float-left col-5 col-xl-2"></p>
						<p id="experiences" class="form-control info-form-challenge float-left col-5 col-xl-3 mr-1 ml-1"></p>
						<p id="opportunities" class="form-control info-form-challenge float-left col-5 col-xl-3"></p>
					</div>
					<input type="hidden" value="{{ $i = 1 }}"> <!-- For represent Questions -->
					@foreach ($categories as $c)
						<hr class="bg-light mt-0 mb-1">
						<div class="form-group d-flex justify-content-center text-center row">
							<h5 class="container text-light mt-2">{{ $c->name }}</h5>
							<div class="container d-flex justify-content-center">
								<!-- Selecting questions with details -->
								<div class="container col-xl-6">
									<select id="question{{ $i }}" name="question_{{ $i }}" class="question{{ $c->name }} form-control btn-cursor" required>
										<option value="" selected disabled>{{ __('Choose a Question ') }}{{ $i }}</option>
									</select>
									<details class="text-warning mt-2" hidden>
										<summary>{{ __('Question ') }}{{ $i++ }}</summary>
										<div class="container rounded-top bg-secondary text-light">
											<p class="text-break pt-2 pb-1 mb-0"></p>
										</div>
										<ol class="rounded-bottom bg-secondary text-light text-left pb-1 mb-0">
											<li></li>
											<li></li>
											<li></li>
											<li></li>
											<li></li>
										</ol>
									</details>
								</div>
								<!-- Selecting questions with details -->
								<div class="container col-xl-6">
									<select id="question{{ $i }}" name="question_{{ $i }}" class="question{{ $c->name }} form-control btn-cursor" required>
										<option value="" selected disabled>{{ __('Choose a Question ') }}{{ $i }}</option>
									</select>
									<details class="text-warning mt-2" hidden>
										<summary>{{ __('Question ') }}{{ $i++ }}</summary>
										<div class="container rounded-top bg-secondary text-light">
											<p class="text-break pt-2 pb-1 mb-0"></p>
										</div>
										<ol class="rounded-bottom bg-secondary text-light text-left pb-1 mb-0">
											<li></li>
											<li></li>
											<li></li>
											<li></li>
											<li></li>
										</ol>
									</details>
								</div> <!-- End of Question Selection -->
							</div>
						</div>
					@endforeach
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Cancel') }}</button>
						<button type="submit" class="btn btn-primary">{{ __('To Save') }}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>