@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.details.index', $plan->url) }}">Detalhes</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('details.show', $detail->id) }}">Visualizar</a></li>
        </ol>
    </nav>
    <div class="container">
        <h1>Visualizar detalhe - {{ $detail->name }}</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $detail->name }}
                </li>
            </ul>

            <form action="{{ route('details.destroy', $detail->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletear Detalhe <i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
@stop