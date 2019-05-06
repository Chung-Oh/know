<section class="card">
	<div class="card-header btn-cursor" id="heading{{ $accordionName }}" data-toggle="collapse" data-target="#collapse{{ $accordionName }}" aria-expanded="true" aria-controls="collapse{{ $accordionName }}">
		<i class="fas fa-{{ $nameIcon }} icon-challenge text-primary align-middle"></i>
		<h2 class="btn btn-link mb-0">{{ $nameLevel }}</h2>
	</div>
	<div id="collapse{{ $accordionName }}" class="collapse" aria-labelledby="heading{{ $accordionName }}" data-parent="#accordionChallenge">
		<div class="card-body">
			<!-- Aqui vai conteudo -->
		</div>
	</div>
</section>