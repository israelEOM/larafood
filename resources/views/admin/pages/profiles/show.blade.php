@extends('adminlte::page')

@section('title', "Detalhes do perfil {$profile->name}")

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('profiles.show', $profile->id) }}">Visualizar</a></li>
        </ol>
    </nav>
    <div class="container">
        <h1>Visualizar Perfil - {{ $profile->name }}</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <ul>
                <li>
                    <strong>Nome: </strong> {{ $profile->name }}
                </li>
                <li>
                    <strong>Descrição: </strong> {{ $profile->description }}
                </li>
            </ul>

            @include('admin.includes.alerts')

            <form action="{{ route('profiles.destroy', $profile->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Deletar Perfil <i class="fas fa-trash-alt"></i></button>
            </form>
        </div>
    </div>
@stop