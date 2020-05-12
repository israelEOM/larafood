@extends('adminlte::page')

@section('title', 'Cadastrar Nova Permissão')

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('permissions.create') }}">Cadastrar</a></li>
        </ol>
    </nav>
    <div class="container">
        <h1>Cadastrar Novo Permissão</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@stop