@extends('adminlte::page')

@section('title', "Editar Permissão {$permission->name}")

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('permissions.index') }}">Permissões</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('permissions.edit', $permission->id) }}">Editar</a></li>
        </ol>
    </nav>
    <div class="container">
        <h1>Editar Permissão - {{ $permission->name }}</h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('permissions.update', $permission->id) }}" class="form" method="POST">
                @method('PUT')
                @csrf
                
                @include('admin.pages.permissions._partials.form')
            </form>
        </div>
    </div>
@stop