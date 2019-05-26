<div class="clock-box rounded-bottom float-right bg-dark text-warning text-center px-3 py-2">
	<p class="mb-0">
		<i class="fas fa-clock mr-2"></i><span class="minute">{{ $levelChallenge->where('id', $challenge->level_challenge_id)[$challenge->level_challenge_id - 1]->times[0]->type }}</span>:<span class="second">00</span>
	</p>
</div>