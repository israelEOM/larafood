@extends('adminlte::page')

@section('title', 'Permissões')

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('permissions.index') }}">Permissões</a></li>
        </ol>
    </nav>
    <div class="container">
        <h1>Permissões
            <a href="{{ route('permissions.create') }}" class="btn btn-success float-right"><i class="fas fa-plus-circle"></i> ADD</a>
        </h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <form action="{{ route('permissions.search') }}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Nome" class="form-control" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-dark"><i class="fas fa-filter
                    "></i> Filtrar</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="160">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr>
                            <td scope="row">{{ $permission->name }}</td>
                            <td>
                                <a href="{{ route('permissions.show', $permission->id) }}" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                {{-- <a href="{{ route('permissions.details.index', $permission->id) }}" class="btn btn-info"><i class="fas fa-search-plus"></i></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            @if (isset($filters))
                {!! $permissions->appends($filters)->links() !!}
            @else
                {!! $permissions->links() !!}
            @endif
            
        </div>

    </div>
@stop