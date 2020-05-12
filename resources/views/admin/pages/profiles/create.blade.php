@extends('adminlte::page')

@section('title', 'Cadastrar Novo Perfil')

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('profiles.create') }}">Cadastrar</a></li>
        </ol>
    </nav>
    <div class="container">
        <h1>Cadastrar Novo Perfil</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@stop