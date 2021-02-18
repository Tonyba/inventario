@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-8">
            <h2> Stock: {{ $producto->stock }} </h2>
            <div class="card h-100">
                <img src="{{ route('producto.getImage', ['filename' => $producto->imagen]) }}"
                    class="card-img-top product-image" alt="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h5 class="card-title">{{$producto->nombre}}</h5>

                        </div>

                        <div class="col-md-6 text-right pr-5">
                            <span class="product-price">{{ $producto->precio }} $</span>
                        </div>
                    </div>
                    <p class="card-text">{{ $producto->descripcion }}</p>

                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-primary text-white"
                                href="{{ route('producto.edit', ['id' => $producto->id] ) }}">Editar</a>
                            <a class="btn btn-danger text-white"
                                href="{{ route('producto.delete', [ 'id' => $producto->id ]) }}">Borrar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>

@endsection