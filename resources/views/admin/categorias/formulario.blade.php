@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cadastro de categorias
                    <a href="{{ url('categorias') }}" class="btn btn-success btn-sm float-right">Listar Categorias</a>
                </div>

                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif
                    @if(Route::is('categorias.show'))
                        {!! Form::model($categoria, ['method'=>'PATCH', 'url'=>'categorias/'.$categoria->id]) !!}
                    @else
                        {!! Form::open(['method'=> 'POST', 'url'=>'categorias'])  !!}
                    @endif
                    {!! Form::label('nome', 'Nome') !!}
                    {!! Form::input('text', 'nome', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome', 'required']) !!}
                    {!! Form::label('ordem', 'Ordem') !!}
                    {!! Form::number('ordem', null, ['min'=>0, 'max'=>10, 'step'=>1, 'class'=>'form-control']) !!}
                    <div class="checkbox">
                        <label>
                            @if(Route::is('categorias.show'))
                                {!! Form::checkbox('destaque', 'S', $categoria->destaque == 'S') !!} Destaque
                            @else
                                {!! Form::checkbox('destaque', 'S') !!} Destaque
                            @endif
                        </label>
                    </div>
                    {!! Form::submit('Salvar', ['class'=>'float-right btn btn-primary mt-1']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
