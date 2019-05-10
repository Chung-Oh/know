@extends('layouts.app')

@section('title', 'EuSei – Challenge Form')

@section('content')

    <section class="screen-full">

		 <!-- Auxiliary storage item where will be used on title of card bellow -->
    	<input type="hidden" value="{{ $iQuestion = 1 }}">
    	<input type="hidden" value="{{ $iAlternative = 1 }}">

        <div class="form-background px-5 py-5">
        	<div class="form-inner bg-secondary rounded d-flex justify-content-center">
	        	<form class="bg-light rounded overflow-auto col-lg-8 col-xl-6" action="#" method="post">
	        		<input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- TOKEN -->
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> <!-- ID User -->
        			<!----------------------------- Time ----------------------------->
        			<div class="clock-box rounded-bottom float-right bg-dark text-warning text-center px-3 py-2">
	        			<p class="mb-0"><i class="fas fa-clock mr-1"></i>{{ $levelChallenge->where('id', $challenge)[0]->times[0]->type }}:00</p>
        			</div>
        			<!----------------------------- All the Questions inner this Div ----------------------------->
	        		<div class="container">
						@foreach ($questions as $q)
			        		<!----------------------------- QUESTION ----------------------------->
			        		<section class="pt-5">
			        			<div class="container pb-3">
				        			<h3 class="font-weight-bold">Question {{ $iQuestion }}</h3>
			        			</div>
			        			<div class="container">
			        				<p class="text-center font-weight-bold mt-0">{{ $q->content }}</p>
			        			</div>
								<div class="container py-3">
									<div class="custom-control custom-radio">
										<input id="radioAlternative{{ $iAlternative }}" type="radio" name="radioQuestion{{ $iQuestion }}" class="custom-control-input" value="{{ $alternatives->where('question_id', $q->id)->first()->id }}">
										<label class="custom-control-label" for="radioAlternative{{ $iAlternative++ }}">{{ $alternatives->where('question_id', $q->id)->first()->content }}</label>
									</div>
									<div class="custom-control custom-radio">
										<input id="radioAlternative{{ $iAlternative }}" type="radio" name="radioQuestion{{ $iQuestion }}" class="custom-control-input" value="{{ $alternatives->where('question_id', $q->id)->splice(1, 1)[0]->id }}">
										<label class="custom-control-label" for="radioAlternative{{ $iAlternative++ }}">{{ $alternatives->where('question_id', $q->id)->splice(1, 1)[0]->content }}</label>
									</div>
									<div class="custom-control custom-radio">
										<input id="radioAlternative{{ $iAlternative }}" type="radio" name="radioQuestion{{ $iQuestion }}" class="custom-control-input" value="{{ $alternatives->where('question_id', $q->id)->splice(2, 2)[0]->id }}">
										<label class="custom-control-label" for="radioAlternative{{ $iAlternative++ }}">{{ $alternatives->where('question_id', $q->id)->splice(2, 2)[0]->content }}</label>
									</div>
									<div class="custom-control custom-radio">
										<input id="radioAlternative{{ $iAlternative }}" type="radio" name="radioQuestion{{ $iQuestion }}" class="custom-control-input" value="{{ $alternatives->where('question_id', $q->id)->splice(3, 3)[0]->id }}">
										<label class="custom-control-label" for="radioAlternative{{ $iAlternative++ }}">{{ $alternatives->where('question_id', $q->id)->splice(3, 3)[0]->content }}</label>
									</div>
									<div class="custom-control custom-radio">
										<input id="radioAlternative{{ $iAlternative }}" type="radio" name="radioQuestion{{ $iQuestion++ }}" class="custom-control-input" value="{{ $alternatives->where('question_id', $q->id)->splice(4, 4)[0]->id }}">
										<label class="custom-control-label" for="radioAlternative{{ $iAlternative++ }}">{{ $alternatives->where('question_id', $q->id)->splice(4, 4)[0]->content }}</label>
									</div>
								</div>
								<blockquote class="font-italic float-right py-3 mb-0 mr-3">
									<p class="mb-0">Author : <cite>"{{ $users->where('id', $q->user_id)[0]->name }}"</cite></p>
								</blockquote>
			        		</section>
						@endforeach
	        		</div> <!-- This is end of Questions container -->

	        		<!----------------------------- Step circles ----------------------------->
					<div class="container d-flex justify-content-center py-3">
						<span class="dot mr-1 bg-secondary"></span>
						<span class="dot mr-1 bg-secondary"></span>
						<span class="dot mr-1 bg-secondary"></span>
						<span class="dot mr-1 bg-secondary"></span>
						<span class="dot mr-1 bg-secondary"></span>
						<span class="dot mr-1 bg-secondary"></span>
						<span class="dot mr-1 bg-secondary"></span>
						<span class="dot mr-1 bg-secondary"></span>
						<span class="dot mr-1 bg-secondary"></span>
						<span class="dot mr-1 bg-secondary"></span>
					</div>

					<!----------------------------- Button Next/Finish ----------------------------->
					<div class="container d-flex justify-content-center pt-3 pb-5">
						<button type="button" class="btn btn-primary col-sm-5 col-md-4 col-lg-2 col-xl-2">Next</button>
					</div>

	        	</form>
        	</div>
        </div>

    </section>

@endsection