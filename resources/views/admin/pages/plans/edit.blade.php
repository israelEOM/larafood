@extends('adminlte::page')

@section('title', "Editar Plano {$plan->name}")

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('plans.edit', $plan->url) }}">Editar</a></li>
        </ol>
    </nav>
    <div class="container">
        <h1>Editar Plano {{ $plan->name }}</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('plans.update', $plan->url) }}" class="form" method="POST">
                @method('PUT')
                @csrf
                
                @include('admin.pages.plans._partials.form')
            </form>
        </div>
    </div>
@stop