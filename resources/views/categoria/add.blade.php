@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header"> Añadir una Nueva Categoria </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categoria.save') }}" enctype="multipart/form-data">
                        @csrf


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
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="Añadir Categoria" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection