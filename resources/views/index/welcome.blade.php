@extends('layouts.app')

@section('title', 'EuSei – Bem vindo')

@section('content')

    @component('index.components.top-welcome') @endcomponent

    @component('index.components.about') @endcomponent

    @component('index.components.plataform') @endcomponent

    @component('index.components.test') @endcomponent

@endsection