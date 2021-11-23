@extends('layouts.guest')

@section('content')
<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
    <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1 class="display-4 font-weight-normal">Produto destaque 1</h1>
        <p class="lead font-weight-normal">algum texto aqui mais grande um pouco</p>
        <a href="#" class="btn btn-outline-secondary">Ver mais</a>
    </div>
    <div class="produto-mostrar box-shadow d-none d-md-block"></div>
    <div class="produto-mostrar produto-mostrar-2 box-shadow d-none d-md-block"></div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="bg-dark mr-md-3 pt-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5"> outro titulo</h2>
            <p class="lead">algum detalhe aqui</p>
        </div>
        <div class="bg-light box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
    <div class="bg-light mr-md-3 pt-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5"> outro titulo</h2>
            <p class="lead">algum detalhe aqui</p>
        </div>
        <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="bg-success mr-md-3 pt-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5"> outro titulo</h2>
            <p class="lead">algum detalhe aqui</p>
        </div>
        <div class="bg-light box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
    <div class="bg-primary mr-md-3 pt-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5"> outro titulo</h2>
            <p class="lead">algum detalhe aqui</p>
        </div>
        <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
</div>

<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="bg-light mr-md-3 pt-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5"> outro titulo</h2>
            <p class="lead">algum detalhe aqui</p>
        </div>
        <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
    <div class="bg-light mr-md-3 pt-3 pt-md-5 px-md-5 text-center overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5"> outro titulo</h2>
            <p class="lead">algum detalhe aqui</p>
        </div>
        <div class="bg-dark box-shadow mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;"></div>
    </div>
</div>
@endsection
