@extends('layouts.guest')

@section('content')
<div class="container">
    <div class="jumbotron">
        <h1>Contatos</h1>
        <hr class="linha-divisao" />
        <p class="lead">
            Av. Presidente Kenney, 2601<br />
            Fone: (46) 3581-5000<br />
            Dois Vizinhos - PR<br />
            CEP: 85660-000
        </p>
        <hr class="linha-divisao" />
        @if(Session::has('mensagem_sucesso'))
            <div class="alert alert-success">
                {{ Session::get('mensagem_sucesso') }}
            </div>
        @endif
        {!! Form::open(['url'=>'contato/enviar', 'method'=>'POST']) !!}
        <div class="form-group">
            {!! Form::label('nome', 'Nome') !!}
            {!! Form::input('text', 'nome', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome', 'required' ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email', 'E-mail') !!}
            {!! Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'E-mail', 'required' ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fone', 'Telefone') !!}
            {!! Form::input('text', 'fone', null, ['class'=>'form-control', 'placeholder'=>'Telefone', 'required' ]) !!}
        </div>
        <div class="form-group">
            {!! Form::label('mensagem', 'Mensagem') !!}
            {!! Form::textarea('mensagem', null, ['class'=>'form-control', 'placeholder'=>'Mensagem', 'required', 'rows'=>4 ]) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Enviar', ['class'=>'form-control btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection
