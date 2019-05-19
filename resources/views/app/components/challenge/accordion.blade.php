<section class="card {{ $border }}">
	<div class="card-header btn-cursor" id="heading{{ $accordionName }}" data-toggle="collapse" data-target="#collapse{{ $accordionName }}" aria-expanded="true" aria-controls="collapse{{ $accordionName }}">
		<i class="fas fa-{{ $iconChallenge }} icon-challenge text-primary align-middle"></i>
		<h2 class="btn btn-link mb-0">{{ $nameLevel }}</h2>
	</div>
	<div id="collapse{{ $accordionName }}" class="collapse" aria-labelledby="heading{{ $accordionName }}" data-parent="#accordion{{ $name }}">
		<div class="card-body d-flex flex-wrap">
			<!-- Auxiliary storage item where will be used on title of card below -->
			<input type="hidden" value="{{ $i = 1 }}">
			@if ($challenges->where('level_challenge_id', $condition)->isNotEmpty())
				@foreach ($challenges as $c)
					@if ($c->level_challenges[0]->id == $condition)
						<!-- Challenge Cards -->
						@Card
							@slot('i', $i) <!-- Increment variable, used on title card -->
							<!-- Icons name used on the cards of challenges -->
							@slot('iconChallenge', $iconChallenge) <!-- Name of icon to show in the accordion -->
							@slot('iconOpportunity', $iconOpportunity) <!-- Name of icon of challenge card -->
							@slot('iconClock', $iconClock) <!-- Name of icon of challenge card -->
							@slot('iconStar', $iconStar) <!-- Name of icon of challenge card -->
							<!-- Variables of business model -->
							@slot('levels', $levels)
							@slot('results', $results)
							@slot('c', $c)
							@slot('levelChallenge', $levelChallenge)
						@endCard
						<input type="hidden" value="{{ $i++ }}"> <!-- Incrementing after created card -->
					@endif
				@endforeach
			@else
				<div class="alert alert-primary col-xl-12 mb-0" role="alert">
					<h5 class="text-font-bold text-center mb-0">{{ __('No any challenge to do, ') }}<span class="font-weight-bold">congratulations!</span></h5>
				</div>
			@endif
		</div>
	</div>
</section>