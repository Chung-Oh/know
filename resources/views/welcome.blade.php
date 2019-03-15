@extends('layout.master')

@section('title', 'Eu Sei | Bem vindo')

@section('content')

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
    <h1 class="mt-5 mb-3">Bem vindo ao <span class="font-italic font-weight-bold text-success">EU SEI</span>.</h1>
    <h4 class="mt-4 mb-4">Uma plataforma divertida de conhecimentos gerais.</h4>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-light col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Become a member ----------------------------->
    <div class="pt-3 pb-3">
        <h5 class="mb-3">Quer se tornar um membro?</h5>
        <a class="btn btn-primary btn-lg" href="#" role="button">Sim, eu quero!</a>
    </div>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-light col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Is a member ----------------------------->
    <div class="pt-3 pb-3">
        <h5 class="mb-3">Já é membro? Entra aqui.</h5>
        <a class="btn btn-primary btn-lg" href="#" role="button">Login</a>
    </div>
</section>

<!-------------------------------------------------- SECTION ABOUT -------------------------------------------------->
<section id="panel-about" class="container-fluid bg-secondary text-center text-white pt-3 pb-5">
    <h3 class="pt-4 mb-4">Aqui você irá se divertir testando seus conhecimentos.</h3>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-light col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- What the platform has to offer ----------------------------->
    <div class="container text-white">
        <h5><span class="font-italic font-weight-bold text-warning">EU SEI</span> oferece uma incrível experiência, entre elas você irá:</h5>
        <div class="row d-flex justify-content-center">
            <ul class="list-group col-11 col-md-8 col-lg-6 col-xl-6 pr-0">
                <li class="list-group-item list-group-item-warning border border-warning correct-size"><span class="font-italic font-weight-bold">Rever</span> algo que você já sabe</li>
                <li class="list-group-item list-group-item-warning border border-warning correct-size"><span class="font-italic font-weight-bold">Aprender</span> algo novo</li>
                <li class="list-group-item list-group-item-warning border border-warning correct-size">Até mesmo <span class="font-italic font-weight-bold">compartilhar</span></li>
            </ul>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-light col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Content about challenge ----------------------------->
    <div class="container">
        <h5>Será realizado desafio com questões de múltipla escolha, tais como:</h5>
        <div class="row d-flex justify-content-center">
            <ul class="list-group col-11 col-md-8 col-lg-6 col-xl-6 pr-0">
                <li class="list-group-item list-group-item-warning border border-warning correct-size">Ciência</li>
                <li class="list-group-item list-group-item-warning border border-warning correct-size">Geografia</li>
                <li class="list-group-item list-group-item-warning border border-warning correct-size">História</li>
                <li class="list-group-item list-group-item-warning border border-warning correct-size">Matemática</li>
                <li class="list-group-item list-group-item-warning border border-warning correct-size">Português</li>
            </ul>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-light col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- User level ----------------------------->
    <div class="container">
        <h5>Também terá níveis de dificuldade, onde estimulará você a resolver e querer avançar cada vez mais. Sendo eles:</h5>
        <div class="row d-flex justify-content-center">
            <ul class="list-group col-11 col-md-8 col-lg-6 col-xl-6 pr-0">
                <li class="list-group-item list-group-item-warning border border-warning correct-size">Iniciante</li>
                <li class="list-group-item list-group-item-warning border border-warning correct-size">Intermediário</li>
                <li class="list-group-item list-group-item-warning border border-warning correct-size">Avançado</li>
                <li class="list-group-item list-group-item-warning border border-warning correct-size">Erudito</li>
            </ul>
        </div>
    </div>
</section>

<!-------------------------------------------------- SECTION PLATAFORM -------------------------------------------------->
<section id="panel-plataform" class="container-fluid text-center pt-3 pb-5 sec-plataform">
    <h3 class="pt-4 mb-4">Breve resumo sobre funcionamento e regras da plataforma.</h3>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-dark col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Information of each profile ----------------------------->
    <div class="container">
        <h5>Para poder participar necessita ser um membro. Onde terá:</h5>
        <div class="row d-flex justify-content-center">
            <ul class="list-group col-11 col-md-8 col-lg-6 col-xl-6 pr-0">
                <li class="list-group-item list-group-item-danger border border-danger correct-size">Seu <span class="font-italic font-weight-bold">nome</span></li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size">Nível de <span class="font-italic font-weight-bold">experiência</span></li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Medalhas</span> conquistadas</li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size">Quantidade de <span class="font-italic font-weight-bold">assertividade</span></li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size">Desafios <span class="font-italic font-weight-bold">abortados</span></li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size">E mais algumas <span class="font-italic font-weight-bold">estatísticas</span> sobre seu <span class="font-italic font-weight-bold">desempenho</span>
            </ul>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-dark col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Details of each level and what DIFFER ----------------------------->
    <div class="container">
        <h5>Todos os níveis terão sempre <span class="font-italic font-weight-bold text-danger">10 perguntas</span>. O que difere entre eles são:</h5>
        <div class="row d-flex justify-content-center">
            <ul class="list-group col-11 col-md-8 col-lg-6 col-xl-6 pr-0">
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Tempo</span> para resolver</li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size">Sua <span class="font-italic font-weight-bold">complexidade</span></li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Oportunidade</span> de refazer um determinado desafio</li>
            </ul>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-dark col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Details about TIME of each level ----------------------------->
    <div class="container">
        <h5><span class="font-italic font-weight-bold text-danger">Tempo</span> para os seguintes níveis são:</h5>
        <div class="row d-flex justify-content-center">
            <ul class="list-group col-11 col-md-8 col-lg-6 col-xl-6 pr-0">
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Iniciante</span> - 10 minutos</li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Intermediário</span> - 8 minutos</li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Avançado</span> - 7 minutos</li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Erudito</span> - 6 minutos</li>
            </ul>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-dark col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Details about OPORTUNITY of each level ----------------------------->
    <div class="container">
        <h5><span class="font-italic font-weight-bold text-danger">Oportunidade</span> para os seguintes níveis são:</h5>
        <div class="row d-flex justify-content-center">
            <ul class="list-group col-11 col-md-8 col-lg-6 col-xl-6 pr-0">
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Iniciante</span> - 4 oportunidades</li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Intermediário</span> - 3 oportunidades</li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Avançado</span> - 2 oportunidades</li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Erudito</span> - 1 oportunidade</li>
            </ul>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-dark col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Details about EXPERIENCE of each assertive answers ----------------------------->
    <div class="container">
        <h5>Pontos serão tratados como <span class="font-italic font-weight-bold text-danger">experiência ou xp</span>. Experiência para cada resposta correta:</h5>
        <div class="row d-flex justify-content-center">
            <ul class="list-group col-11 col-md-8 col-lg-6 col-xl-6 pr-0">
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Iniciante</span> - 1xp</li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Intermediário</span> - 2xp</li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Avançado</span> - 3xp</li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Erudito</span> - 4xp</li>
            </ul>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-dark col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Detail of how to gain experience ----------------------------->
    <div class="container">
        <h5>Outras formas de se ganhar experiência:</h5>
        <div class="row d-flex justify-content-center">
            <ul class="list-group col-11 col-md-8 col-lg-6 col-xl-6 pr-0">
                <li class="list-group-item list-group-item-danger border border-danger correct-size">Cada desafio realizado <span class="font-italic font-weight-bold">5xp</span></li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size">Cada avanço de nível ou conquistas <span class="font-italic font-weight-bold">50xp</span></li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size"><span class="font-italic font-weight-bold">Contribuindo</span> com a plataforma, onde o membro irá preencher um formulário com pergunta e respostas. Se <span class="font-italic font-weight-bold">aceito</span> pelo Administrador irá ganhar <span class="font-italic font-weight-bold">10xp</span> e terá os créditos quando algum outro membro realizar desafio</li>
            </ul>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-dark col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Rules very important about challenges ----------------------------->
    <div class="container">
        <h5>Regras a seguir <span class="font-italic font-weight-bold text-danger">são válidas para todos os níveis</span>, é muito <span class="font-italic font-weight-bold text-danger">importante</span> que você saibe desde já para <span class="font-italic font-weight-bold text-danger">não perder pontos e oportunidades</span>.</h5>
        <div class="row d-flex justify-content-center">
            <ul class="list-group col-11 col-md-8 col-lg-6 col-xl-6 pr-0">
                <li class="list-group-item list-group-item-danger border border-danger correct-size">Não poderá <span class="font-italic font-weight-bold">consultar</span> no seu navegador, pois assim será <span class="font-italic font-weight-bold">anulado</span> o desafio e ficará registrado no seu histórico</li>
                <li class="list-group-item list-group-item-danger border border-danger correct-size">Assim que <span class="font-italic font-weight-bold">iniciar</span> um desafio não poderá <span class="font-italic font-weight-bold">fechar</span> aplicação, pois será <span class="font-italic font-weight-bold">abortado</span> e também ficará registrado no seu histórico</li>
            </ul>
        </div>
    </div>
</section>

<!-------------------------------------------------- SECTION TEST -------------------------------------------------->
<section id="panel-test" class="container-fluid text-center pt-3 mb-5">
    <h3 class="pt-4 mb-4">Parabéns por ter chegado até aqui.</h3>
    <h5>Acredito que você teve algum interesse ou alguma curiosidade.</h5>

    <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-dark col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Brief explanation of the test section ----------------------------->
    <h5>Essa seção tem o intuito de poder testar a plataforma <span class="font-weight-bold text-success">EU SEI</span>.</h5>
    <h5>Esse teste será de nível Iniciante e você pode realizar quantas vezes que quiser, logo os pontos ganhos aqui <span class="font-weight-bold text-success">não serão contados</span> no seu histórico.</h5>

     <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-dark col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Rules for test match ----------------------------->
    <div class="container">
        <h5>Vamos relembrar algumas regras:</h5>
        <div class="row d-flex justify-content-center">
            <ul class="list-group col-11 col-md-8 col-lg-6 col-xl-6 pr-0">
                <li class="list-group-item list-group-item-success border border-success correct-size">Terá tempo de <span class="font-italic font-weight-bold">10 minutos</span></li>
                <li class="list-group-item list-group-item-success border border-success correct-size"><span class="font-italic font-weight-bold">Complexidade</span> da pergunta <span class="font-italic font-weight-bold">baixa</span></li>
                <li class="list-group-item list-group-item-success border border-success correct-size">Desafio realizado <span class="font-italic font-weight-bold">5xp</span></li>
                <li class="list-group-item list-group-item-success border border-success correct-size">Resposta correta <span class="font-italic font-weight-bold">1xp</span></li>
                <li class="list-group-item list-group-item-success border border-success correct-size"><span class="font-italic font-weight-bold">Não</span> pode <span class="font-italic font-weight-bold">abrir</span> outra aba no seu navegador</li>
                <li class="list-group-item list-group-item-success border border-success correct-size"><span class="font-italic font-weight-bold">Não</span> pode <span class="font-italic font-weight-bold">minimizar</span> aplicação</li>
            </ul>
        </div>
    </div>

     <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-dark col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <!----------------------------- Initiate test ----------------------------->
    <div class="container">
        <h5>Tudo pronto, agora que você já sabe das regras vamos lá!</h5>
        <div class="row d-flex justify-content-center"><!------- Button TEST ------->
            <a class="btn btn-primary btn-lg btn-block col-11 col-xl-6" href="#" role="button">Iniciar Teste</a>
        </div>
    </div>

     <div class="row d-flex justify-content-center">
        <hr class="my-4 bg-dark col-10"><!------------- LINE - THEMATIC BREAK ------------->
    </div>

    <h5>Desenvolvido com muito carinho, pensando em <span class="font-weight-bold text-success">você</span>.</h5>
</section>

@endsection