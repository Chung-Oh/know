<!----------------------------- THIS SECTION USES MODAL AS FORM CREATE ----------------------------->
<section id="formChallenge" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="formQuestionModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 id="formQuestionModalLabel" class="modal-title text-white font-weight-bold">New Challenge</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body bg-dark">
				<!-- Put message about action when modify Route and file JS -->
				<form action="{{ action('Admin\ChallengeController@create') }}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- TOKEN -->
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> <!-- ID User -->
					<input id="idQuestion" type="hidden" name="id_question"> <!-- ID Question -->
					<div class="form-group d-flex justify-content-center">
						<select name="category_id" class="form-control btn-cursor" required> <!-- Selecting Categories -->
							<option id="levelChallengeId" value="" selected disabled>{{ __('Choose a Level') }}</option>
							@foreach ($levelChallenges as $l)
								<option value="{{ $l->id }}">{{ $l->levels[0]->name }}</option>
							@endforeach
						</select>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('Cancel') }}</button>
						<button type="submit" class="btn btn-primary">{{ __('To Save') }}</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>