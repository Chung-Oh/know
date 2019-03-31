<!----------------------------- THIS SECTION USES MODAL AS FORM CREATE ----------------------------->
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
					<form action="/questions/new" method="post">
						<input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- TOKEN -->
						<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> <!-- Id user -->
						<div class="form-group d-flex justify-content-center">
						    <select name="category_id" class="form-control btn-cursor" required> <!-- Selecting Categories -->
						    	<option value="" selected disabled>{{ __('Choose a Category') }}</option>
						    	@foreach ($categories as $c)
									<option value="{{ $c->id }}">{{ $c->name }}</option>
						    	@endforeach
						    </select>
						    <select name="level_id" class="form-control btn-cursor" required> <!-- Selecting Levels -->
						    	<option value="" selected disabled>{{ __('Choose a Level') }}</option>
						    	@foreach ($levels as $l)
									<option value="{{ $l->id }}">{{ $l->name }}</option>
						    	@endforeach
						    </select>
						</div>
						<!----------------------------- Inserting the content of the alternatives ----------------------------->
						<div class="form-group">
							<textarea name="question" class="form-control" onfocus="this.value=''" maxlength="1000" placeholder="{{ __('Question...') }}" required></textarea>
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
						<!----------------------------- Choosing Correct Alternative ----------------------------->
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