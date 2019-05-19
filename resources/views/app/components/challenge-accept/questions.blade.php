<div id="listQuestions" class="container">
	@foreach ($questions as $q)
		<!----------------------------- QUESTION ----------------------------->
		<section class="question pt-5" hidden>
			<div class="container">
    			<h3 class="font-weight-bold">{{ __('Question') }} {{ $iQuestion }}</h3>
			</div>

			<!------------- LINE - THEMATIC BREAK ------------->
		    <hr class="bg-secondary my-4">

		    <!----------------------------- Content Question ----------------------------->
			<div class="container">
				<p class="text-center font-weight-bold mt-0">{{ $q->content }}</p>
			</div>

			<!----------------------------- Alternatives ----------------------------->
			<div class="container py-3">
				<!-- ID of question below -->
				<input type="hidden" name="question{{ $iQuestion }}" value="{{ $q->id }}">
				<div class="custom-control custom-radio">
					<input id="radioAlternative{{ $iAlternative }}" type="radio" name="radioAlternative{{ $iQuestion }}" class="alternative-accept-{{ $iQuestion }} custom-control-input" value="{{ $alternatives->where('question_id', $q->id)->first()->id }}">
					<label class="custom-control-label" for="radioAlternative{{ $iAlternative++ }}">{{ $alternatives->where('question_id', $q->id)->first()->content }}</label>
				</div>
				<div class="custom-control custom-radio">
					<input id="radioAlternative{{ $iAlternative }}" type="radio" name="radioAlternative{{ $iQuestion }}" class="alternative-accept-{{ $iQuestion }} custom-control-input" value="{{ $alternatives->where('question_id', $q->id)->splice(1, 1)[0]->id }}">
					<label class="custom-control-label" for="radioAlternative{{ $iAlternative++ }}">{{ $alternatives->where('question_id', $q->id)->splice(1, 1)[0]->content }}</label>
				</div>
				<div class="custom-control custom-radio">
					<input id="radioAlternative{{ $iAlternative }}" type="radio" name="radioAlternative{{ $iQuestion }}" class="alternative-accept-{{ $iQuestion }} custom-control-input" value="{{ $alternatives->where('question_id', $q->id)->splice(2, 2)[0]->id }}">
					<label class="custom-control-label" for="radioAlternative{{ $iAlternative++ }}">{{ $alternatives->where('question_id', $q->id)->splice(2, 2)[0]->content }}</label>
				</div>
				<div class="custom-control custom-radio">
					<input id="radioAlternative{{ $iAlternative }}" type="radio" name="radioAlternative{{ $iQuestion }}" class="alternative-accept-{{ $iQuestion }} custom-control-input" value="{{ $alternatives->where('question_id', $q->id)->splice(3, 3)[0]->id }}">
					<label class="custom-control-label" for="radioAlternative{{ $iAlternative++ }}">{{ $alternatives->where('question_id', $q->id)->splice(3, 3)[0]->content }}</label>
				</div>
				<div class="custom-control custom-radio">
					<input id="radioAlternative{{ $iAlternative }}" type="radio" name="radioAlternative{{ $iQuestion }}" class="alternative-accept-{{ $iQuestion++ }} custom-control-input" value="{{ $alternatives->where('question_id', $q->id)->splice(4, 4)[0]->id }}">
					<label class="custom-control-label" for="radioAlternative{{ $iAlternative++ }}">{{ $alternatives->where('question_id', $q->id)->splice(4, 4)[0]->content }}</label>
				</div>
			</div>

			<!----------------------------- Question Creator ----------------------------->
			<blockquote class="font-italic float-right py-3 mb-0 mr-3">
				<p class="mb-0">{{ __('Author') }} : <cite>"{{ $users->where('id', $q->user_id)[0]->name }}"</cite></p>
			</blockquote>
		</section>
	@endforeach
</div>