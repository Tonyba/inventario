@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <select class="form-control categoria" class="form-control">
                <option value="0">All</option>
                @foreach($categorias as $categoria)
                <option value="{{$categoria->id}}" <?=$currentCategoriaId == $categoria->id ? 'selected' : ''?>>
                    {{ $categoria->nombre }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-6">
            <input class="form-control search" type="text">
        </div>

        <div class="col-md-2">
            <button class="btn btn-success submitSearch">Buscar</button>
        </div>
    </div>
    <div class=" row">
        @foreach($productos as $producto)
        <div class="col-md-4 mb-4">
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

                    <a href="{{ route('producto.detail', ['id' => $producto->id]) }}"
                        class="btn btn-primary btn-block">Ver</a>

                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row justify-content-center">
        @if(method_exists($productos, 'links'))
        {{ $productos->links() }}
        @endif
    </div>
</div>
@endsection