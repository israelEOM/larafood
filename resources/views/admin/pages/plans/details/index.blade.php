@extends('adminlte::page')

@section('title', "Detalhes do plano {$plan->name}")

@section('content_header')
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.index') }}">Planos</a></li>
            <li class="breadcrumb-item"><a href="{{ route('plans.show', $plan->url) }}">{{ $plan->name }}</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('plans.details.index', $plan->url) }}">Detalhes</a></li>
        </ol>
    </nav>
    <div class="container">
        <h1>Detalhes do plano {{ $plan->name }}
            <a href="{{ route('plans.details.create', $plan->url) }}" class="btn btn-success float-right"><i class="fas fa-plus-circle"></i> ADD</a>
        </h1>
    </div>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            @include('admin.includes.alerts')

            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th width="120">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($details as $detail)
                        <tr>
                            <td scope="row">{{ $detail->name }}</td>
                            <td>
                                <a href="{{ route('details.edit', $detail->id) }}" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                <a href="{{ route('details.show', $detail->id) }}" class="btn btn-success"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card-footer">
            @if (isset($filters))
                {!! $details->appends($filters)->links() !!}
            @else
                {!! $details->links() !!}
            @endif
            
        </div>

    </div>
@stop