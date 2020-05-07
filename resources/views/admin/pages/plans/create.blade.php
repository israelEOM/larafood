@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('plans.create') }}">Cadastrar</a></li>
        </ol>
    </nav>
    <div class="container">
        <h1>Cadastrar Novo Plano</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@stop