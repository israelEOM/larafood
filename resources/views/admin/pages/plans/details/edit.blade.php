@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.details.index', $plan->url) }}">Detalhes</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('details.edit', $detail->id) }}">Editar</a></li>
        </ol>
    </nav>
    <div class="container">
        <h1>Editar Detalhe do plano Plano {{ $plan->name }}</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('details.update', $detail->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.plans.details._partials.form')
            </form>
        </div>
    </div>
@stop