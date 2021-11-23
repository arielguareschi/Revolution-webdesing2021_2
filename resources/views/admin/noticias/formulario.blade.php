@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Cadastro de noticias
                    <a href="{{ url('noticias') }}" class="btn btn-success btn-sm float-right">Listar noticias</a>
                </div>

                <div class="card-body">
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{ Session::get('mensagem_sucesso') }}</div>
                    @endif
                    @if(Route::is('noticias.show'))
                        {!! Form::model($noticia, ['method'=>'PATCH', 'url'=>'noticias/'.$noticia->id, 'files'=>true]) !!}
                        <div class="col-md-12 text-center">
                            <img src="{{ url('/') }}/uploads/fotos/{{ $noticia->foto }}" alt="" width="100" class="img-thumbnail">
                        </div>
                    @else
                        {!! Form::open(['method'=> 'POST', 'url'=>'noticias', 'files'=>true])  !!}
                    @endif
                    {!! Form::label('titulo', 'Título') !!}
                    {!! Form::input('text', 'titulo', null, ['class'=>'form-control', 'autofocus', 'placeholder'=>'Título', 'required', 'maxlength'=>200]) !!}

                    {!! Form::label('texto', 'Texto') !!}
                    {!! Form::textarea('texto', null, ['class'=>'form-control', 'rows'=>'7', 'required']) !!}

                    {!! Form::label('foto', 'Foto') !!}
                    {!! Form::file('foto', ['class'=>'form-control btn-sm']) !!}

                    {!! Form::label('fonte', 'Fonte') !!}
                    {!! Form::input('text', 'fonte', null, ['class'=>'form-control', 'placeholder'=>'Fonte', 'required', 'maxlength'=>100, 'required']) !!}

                    {!! Form::label('data', 'Data') !!}
                    {!! Form::date('data', \Carbon\Carbon::now(), ['class'=>'form-control', 'required']) !!}

                    {!! Form::label('categoria_id', 'Categoria') !!}
                    {!! Form::select('categoria_id', $categorias, null, ['class'=>'form-control', 'placeholder'=>'Selecione a categoria', 'required']) !!}

                    <div class="checkbox">
                        <label>
                            @if(Route::is('noticias.show'))
                                {!! Form::checkbox('manchete', 'S', $noticia->manchete == 'S') !!} Manchete
                            @else
                                {!! Form::checkbox('manchete', 'S') !!} Manchete
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
