@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header"> Añadir un Nuevo Producto </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('producto.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="imagen">Imagen</label>
                            <div class="col-md-7">
                                <input class="form-control {{ $errors->has('imagen') ? 'is-invalid' : ''  }}"
                                    id="imagen" name="imagen" type="file" />
                                @if($errors->has('imagen'))
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('imagen') }} </strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="nombre">Nombre</label>
                            <div class="col-md-7">
                                <input type="text"
                                    class="form-control {{ $errors->has('nombre') ? 'is-invalid' : ''  }} " id="nombre"
                                    name="nombre" required />
                                @if($errors->has('nombre'))
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('nombre')  }} </strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="precio">precio</label>
                            <div class="col-md-7">
                                <input type="number"
                                    class="form-control {{ $errors->has('precio') ? 'is-invalid' : ''  }} " id="precio"
                                    name="precio" required />
                                @if($errors->has('precio'))
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('precio')  }} </strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="precio">Stock</label>
                            <div class="col-md-7">
                                <input type="number"
                                    class="form-control {{ $errors->has('stock') ? 'is-invalid' : ''  }} " id="stock"
                                    name="stock" required />
                                @if($errors->has('stock'))
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('stock')  }} </strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="descripcion">descripcion</label>
                            <div class="col-md-7">
                                <textarea class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : ''  }} "
                                    id="descripcion" name="descripcion" required></textarea>
                                @if($errors->has('descripcion'))
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $errors->first('descripcion')  }} </strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label text-md-right" for="categoria">categoria</label>
                            <div class="col-md-7">
                                <select class="form-control" name="categoria" id="categoria">
                                    @foreach($categorias as $categoria)
                                    <option value="{{ $categoria->id }}">{{ $categoria->nombre}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="Añadir Producto" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection