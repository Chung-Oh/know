@extends('layouts.app')

@section('title', 'EuSei – Challenge Form')

@section('content')

    <section class="screen-full">

		 <!-- Auxiliary storage item where will be used on title of card below -->
    	<input type="hidden" value="{{ $iQuestion = 1 }}">
    	<input type="hidden" value="{{ $iAlternative = 1 }}">

        <div class="form-background px-5 py-5">
        	<div class="form-inner bg-secondary rounded d-flex justify-content-center">
	        	<form class="bg-light rounded overflow-auto col-lg-8 col-xl-6" action="{{ action('ChallengeController@finish') }}" method="post">
	        		<input type="hidden" name="_token" value="{{ csrf_token() }}"> <!-- TOKEN -->
					<input type="hidden" name="user_id" value="{{ Auth::user()->id }}"> <!-- ID User -->
        			<!----------------------------- Time ----------------------------->
        			<div class="clock-box rounded-bottom float-right bg-dark text-warning text-center px-3 py-2">
	        			<p class="mb-0">
	        				<i class="fas fa-clock mr-2"></i><span class="minute">{{ $levelChallenge->where('id', $challenge->level_challenge_id)[$challenge->level_challenge_id - 1]->times[0]->type }}</span>:<span class="second">00</span>
	        			</p>
        			</div>

        			<!----------------------------- Message when Time runs Out ----------------------------->
			    	@MsgTimeOver @endMsgTimeOver

        			<!----------------------------- All the Questions inner this Div ----------------------------->
	        		@QuestionsChallengeAccept
						@slot('iQuestion', $iQuestion) <!-- Iterator of Questions -->
						@slot('iAlternative', $iAlternative) <!-- Iterator of Alternatives -->
						@slot('questions', $questions) <!-- List of Questions -->
						@slot('alternatives', $alternatives) <!-- List of Alternatives -->
						@slot('users', $users) <!-- Used on blockquote to show the Creator -->
	        		@endQuestionsChallengeAccept

	        		<!------------- LINE - THEMATIC BREAK ------------->
				    <hr id="endLine" class="bg-secondary my-4 col-xl-12 row" hidden>

					<!----------------------------- End of Form with Dots and Button ----------------------------->
					@BottomChallengeAccept @endBottomChallengeAccept

	        	</form>
        	</div>
        </div>

    </section>

@endsection