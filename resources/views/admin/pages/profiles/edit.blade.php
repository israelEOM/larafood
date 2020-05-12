@extends('adminlte::page')

@section('title', "Editar Perfil {$profile->name}")

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Perfis</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('profiles.edit', $profile->id) }}">Editar</a></li>
        </ol>
    </nav>
    <div class="container">
        <h1>Editar Perfil - {{ $profile->name }}</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profiles.update', $profile->id) }}" class="form" method="POST">
                @method('PUT')
                @csrf
                
                @include('admin.pages.profiles._partials.form')
            </form>
        </div>
    </div>
@stop