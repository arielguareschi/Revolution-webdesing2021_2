@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="uploads/fotos/242140891_2125512364268006_6783190083996030726_n.jpg" data-fancybox=""   data-caption="teste" >

                        <img class="mainImage" src="uploads/fotos/242140891_2125512364268006_6783190083996030726_n.jpg" alt="" id="mainImage" >
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
