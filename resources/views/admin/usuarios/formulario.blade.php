@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cadastro de usuários
                    <a href="{{ url('usuarios') }}" class="btn btn-success btn-sm float-right">Listar Usuários</a>
                </div>

                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif
                    @if(Route::is('usuarios.show'))
                        {!! Form::model($usuario, ['method'=>'PATCH', 'url'=>'usuarios/'.$usuario->id]) !!}
                        {!! Form::hidden('original', $usuario->password) !!}
                    @else
                        {!! Form::open(['method'=> 'POST', 'url'=>'usuarios'])  !!}
                    @endif
                    {!! Form::label('name', 'Nome') !!}
                    {!! Form::input('text', 'name', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome', 'required']) !!}
                    {!! Form::label('email', 'E-mail') !!}
                    {!! Form::input('email', 'email', null, ['class'=>'form-control', 'placeholder'=>'E-mail', 'required']) !!}
                    {!! Form::label('password', 'Senha') !!}
                    {!! Form::input('password', 'password', null, ['class'=>'form-control', 'placeholder'=>'Senha', 'required']) !!}
                    {!! Form::submit('Salvar', ['class'=>'float-right btn btn-primary mt-1']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
