<!-- Line green above the page -->
<div class="bg-success pt-1"></div>

<!----------------------------- SECTION APPLICATION TOP ----------------------------->
<section class="container-fluid bg-dark jumbotron rounded-0 mb-0 text-center text-white">
    <!----------------------------- Buttons to navigate the page ----------------------------->
    <nav>
        <ul class="list-inline">
            <a href="#panel-about" class="btn btn-outline-success font-weight-bold btn-lg">Sobre</a>
            <a href="#panel-plataform" class="btn btn-outline-success font-weight-bold btn-lg">Plataforma</a>
            <a href="#panel-test" class="btn btn-outline-success font-weight-bold btn-lg">Teste</a>
        </ul>
    </nav>
    <h1 class="mt-5 mb-3">Bem vindo ao <span class="font-italic font-weight-bold text-success">EuSei</span>.</h1>
    <h4 class="mt-4 mb-4">Uma plataforma divertida de conhecimentos gerais.</h4>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-light col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Become a member ----------------------------->
    <div class="pt-3 pb-3">
        <h5 class="mb-3">Quer se tornar um membro?</h5>
        <a class="btn btn-primary btn-lg" href="{{ route('register') }}" role="button">Sim, eu quero!</a>
    </div>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-light col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Is a member ----------------------------->
    <div class="pt-3 pb-3">
        <h5 class="mb-3">Já é membro? Entra aqui.</h5>
        <a class="btn btn-primary btn-lg" href="{{ route('login') }}" role="button">Login</a>
    </div>
</section>