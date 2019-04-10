<!----------------------------- THIS SECTION USES MODAL AS FORM CREATE ----------------------------->
<section id="formQuestion" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="formQuestionModalLabel" aria-hidden="true" data-backdrop="static">
	<div class="modal-dialog modal-dialog-scrollable" role="document">
		<div class="modal-content">
			<div class="modal-header bg-success">
				<h5 id="formQuestionModalLabel" class="modal-title text-white font-weight-bold"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body bg-dark">
				<form action="{{ action('Admin\QuestionController@create') }}" method="post"> <!-- Put message about action when modify Route and file JS -->
					<input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- TOKEN -->
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> <!-- ID User -->
					<input id="idQuestion" type="hidden" name="id_question"> <!-- ID Question -->
					<!-- Input Type to find out if it was created by the Administrator or Contribution -->
					<input id="type" type="hidden" name="type" value="{{ $type }}">
					<div class="form-group d-flex justify-content-center">
						<select name="category_id" class="form-control btn-cursor" required> <!-- Selecting Categories -->
							<option id="categoryId" value="" selected disabled>{{ __('Choose a Category') }}</option>
							@foreach ($categories as $c)
								<option value="{{ $c->id }}">{{ $c->name }}</option>
							@endforeach
						</select>
						<select name="level_id" class="form-control btn-cursor" required> <!-- Selecting Levels -->
							<option id="levelId" value="" selected disabled>{{ __('Choose a Level') }}</option>
							@foreach ($levels as $l)
								<option value="{{ $l->id }}">{{ $l->name }}</option>
							@endforeach
						</select>
					</div>
					<!----------------------------- Inserting the content of the alternatives ----------------------------->
					<div class="form-group">
						<textarea id="question" name="question" class="form-control" onfocus="this.value=''" maxlength="1000" placeholder="{{ __('Question...') }}" required></textarea>
					</div>
					<div class="form-group">
						<input id="alternative1" name="alternative_1" type="text" class="form-control text-center" title="{{ ('Maximum of 255 characters') }}" pattern="^([\w\s\dáâãéêíóõôúç].{0,255})" placeholder="{{ __('Alternative 1') }}" onfocus="this.value=''" required>
					</div>
					<div class="form-group">
						<input id="alternative2" name="alternative_2" type="text" class="form-control text-center" title="{{ ('Maximum of 255 characters') }}" pattern="^([\w\s\dáâãéêíóõôúç].{0,255})" placeholder="{{ __('Alternative 2') }}" onfocus="this.value=''" required>
					</div>
					<div class="form-group">
						<input id="alternative3" name="alternative_3" type="text" class="form-control text-center" title="{{ ('Maximum of 255 characters') }}" pattern="^([\w\s\dáâãéêíóõôúç].{0,255})" placeholder="{{ __('Alternative 3') }}" onfocus="this.value=''" required>
					</div>
					<div class="form-group">
						<input id="alternative4" name="alternative_4" type="text" class="form-control text-center" title="{{ ('Maximum of 255 characters') }}" pattern="^([\w\s\dáâãéêíóõôúç].{0,255})" placeholder="{{ __('Alternative 4') }}" onfocus="this.value=''" required>
					</div>
					<div class="form-group">
						<input id="alternative5" name="alternative_5" type="text" class="form-control text-center" title="{{ ('Maximum of 255 characters') }}" pattern="^([\w\s\dáâãéêíóõôúç].{0,255})" placeholder="{{ __('Alternative 5') }}" onfocus="this.value=''" required>
					</div>
					<!----------------------------- Choosing Correct Alternative ----------------------------->
					<div class="text-center">
						<label class="text-white">{{ __('Alternative correct :') }}</label>
						<div class="custom-control custom-radio custom-control-inline">
							<input id="radioAlternative1" type="radio" name="radioAlternativeCorrect" class="custom-control-input" value="1" checked>
							<label class="custom-control-label text-white" for="radioAlternative1">1</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input id="radioAlternative2" type="radio" name="radioAlternativeCorrect" class="custom-control-input" value="2">
							<label class="custom-control-label text-white" for="radioAlternative2">2</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input id="radioAlternative3" type="radio" name="radioAlternativeCorrect" class="custom-control-input" value="3">
							<label class="custom-control-label text-white" for="radioAlternative3">3</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input id="radioAlternative4" type="radio" name="radioAlternativeCorrect" class="custom-control-input" value="4">
							<label class="custom-control-label text-white" for="radioAlternative4">4</label>
						</div>
						<div class="custom-control custom-radio custom-control-inline">
							<input id="radioAlternative5" type="radio" name="radioAlternativeCorrect" class="custom-control-input" value="5">
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
</section>