@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Lista de categorias
                    <a href="{{ url('categorias/create') }}" class="btn btn-success btn-sm float-right">Nova Categoria</a>
                </div>

                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif
                    @if(Session::has('mensagem_aviso'))
                        <div class="alert alert-danger">{{ Session::get('mensagem_aviso') }}</div>
                    @endif
                    <table class="table table-sm table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Código</th>
                                <th>Nome</th>
                                <th>Destaque</th>
                                <th>Ordem</th>
                                <th>Opções</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                                <tr>
                                    <td>{{ $categoria->id }}</td>
                                    <td>{{ $categoria->nome }}</td>
                                    <td>{{ $categoria->destaque }}</td>
                                    <td>{{ $categoria->ordem }}</td>
                                    <td>
                                        <a href="{{ url('categorias/'.$categoria->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                        {!! Form::open(['method'=>'DELETE', 'url'=>'categorias/'.$categoria->id, 'style'=>'display:inline']) !!}
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="pagination justify-content-center">
                        {{ $categorias->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
