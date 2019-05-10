<div class="flip-box container col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 my-2">
	<div class="flip-box-inner">
		<!----------------------------- Card Front ----------------------------->
		<div class="flip-box-front">
			<div class="bg-dark rounded-top">
				<img class="logo-card" src="../../images/logo-mini.jpg">
				<small class="info-id-card text-light float-right mb-0 mt-1 mr-2">ID : {{ $c->id }}</small>
			</div>
			<div class="bg-dark rounded-bottom text-center text-light pt-1 pb-2">
				<p class="card-title text-success font-weight-bold mt-4 mb-3">Challenge #{{ $i }}</p>

				<!------------------------------ FICAR ATENTO AQUI, NÃO TERMINADO ------------------------------>
				<p class="card-content font-italic mb-0">Status : <span class="text-warning">To do</span></p><br>
				<!---------------------------------------------------------------------------------------------->

			</div>
		</div>
		<!----------------------------- Card Back ----------------------------->
		<div class="flip-box-back">
			<div class="bg-dark rounded-top">
				<img class="logo-card" src="../../images/logo-mini.jpg">
				<small class="info-id-card text-light float-right mb-0 mt-1 mr-2">ID : {{ $c->id }}</small>
			</div>
			<div class="bg-dark rounded-bottom text-center text-light pt-1 pb-3">
				<small class="font-italic"><i class="{{ $iconClock }} mr-1"></i><span class="text-warning">{{ $c->level_challenges[0]->times[0]->type }}</span> {{ __('minutes') }}</small><br>

				<!------------------------------ FICAR ATENTO AQUI, NÃO TERMINADO ------------------------------>
				<small class="font-italic"><i class="fas fa-dice-{{ $iconOpportunity }} mr-1"></i><span class="text-warning">0/{{ $c->level_challenges[0]->opportunities[0]->type }}</span> {{ __('Opportunity') }}</small><br>
				<!---------------------------------------------------------------------------------------------->

				<small class="font-italic"><i class="{{ $iconStar }} mr-1"></i><span class="text-warning">{{ $c->level_challenges[0]->experiences[0]->type }}</span> {{ __('points') }}</small><br>
				<!-- Button below with some information for application to work -->
				<form action="{{ action('ChallengeController@accept') }}" method="post">
					<input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- TOKEN -->
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> <!-- ID User -->
					<input type="hidden" name="challenge_id" value="{{ $c->id }}">
					<button type="submit" onclick="$('.loading').css('display', 'block')" class="btn btn-primary btn-sm mt-2">{{ __('Accept') }}</button>
				</form>
			</div>
		</div>
	</div>
</div>