<div id="endForm" hidden>
	<!----------------------------- Step circles ----------------------------->
	<div class="container d-flex justify-content-center py-3">
		@for ($dot = 1; $dot <= 10; $dot++)
		<span class="dot mr-1 bg-secondary"></span>
		@endfor
	</div>

	<!----------------------------- Button Next/Finish ----------------------------->
	<div class="container d-flex justify-content-center pt-3 pb-5">
		<button id="btnFormAccept" type="button" class="btn btn-primary col-sm-5 col-md-4 col-lg-2 col-xl-2">{{ __('Next')}}</button>
	</div>
</div>