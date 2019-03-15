<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="author" content="Daniel Chung">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="icon" href="favicon.ico" type="image/x-icon">
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body>
	@auth
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top pt-0 pb-0">
				<a class="navbar-brand icon-home" href="#"><i class="fas fa-home"></i></a>
				<button class="navbar-toggler border border-white" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="fas fa-bars"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li><a class="nav-link text-white correct-size" href="#">Perfil</a></li>
						<li><a class="nav-link text-white correct-size" href="#">Desafios</a></li>
						<li><a class="nav-link text-white correct-size" href="#">Classificação</a></li>
						<li><a class="nav-link text-white correct-size" href="#">Contribuir</a></li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle text-white correct-size" href="#" id="navbardrop" data-toggle="dropdown">Admin</a>
							<div class="dropdown-menu bg-success border border-white">
								<a class="dropdown-item text-dark font-weight-bold correct-size" href="#">Dashboard</a>
								<a class="dropdown-item text-dark font-weight-bold correct-size" href="#">Histórico</a>
								<a class="dropdown-item text-dark font-weight-bold correct-size" href="#">Feedback</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>
		</header>
	@endauth
	<main id="app">

		@yield('content')

	</main>
	<button class="btn-top" title="Ir para o topo">
		<i class="fas fa-angle-up icon-up"></i>
	</button>
	<footer class="bg-success text-center pt-3 pb-3">
		<div class="d-flex justify-content-center">
			<h3 class="align-self-center text-white mb-0 mr-2">Follow me:</h3>
			<ul class="list-inline mb-0 d-flex align-items-end">
				<li class="list-inline-item">
					<a class="icon-network" href="https://www.linkedin.com/in/danielvitorchung/" target="_blank" data-toggle="tooltip" title="Linkedin"><i class="fab fa-linkedin"></i></a>
				</li>
				<li class="list-inline-item">
					<a class="icon-network" href="https://github.com/Chung-Oh" target="_blank" data-toggle="tooltip" title="GitHub"><i class="fab fa-github"></i></a>
				</li>
			</ul>
		</div>
		<p class="text-white mb-0 pb-1">&copy 2019 <span class="text-dark font-weight-bold">EuSei</span> - Developing by Daniel Chung</p>
	</footer>
	<script src="{{ mix('js/app.js') }}"></script>
	<!-- Condition in this script only when you have the Welcome page -->
	@if (Request::path() == '/')
		<script>
	    	/*
			* Function below moves to section slowly
			*/
			ativaScrollSuave = selector => {
				$(selector).click(function(event) {
					event.preventDefault();
					let target = $(this).attr('href');
					$('html, body').animate({
						scrollTop: $(target).offset().top
					}, 700)
				});
			}
			/*
			* Put listeners on buttons
			*/
			ativaScrollSuave('a[href*=panel-about]');
			ativaScrollSuave('a[href*=panel-plataform]');
			ativaScrollSuave('a[href*=panel-test]');
		</script>
	@endif
</body>
</html>
