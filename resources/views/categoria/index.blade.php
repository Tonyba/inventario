@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="mb-3">Categorias</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categorias as $categoria)
                    <tr>
                        <td>{{$categoria->nombre}}
                        </td>
                        <td>
                            <a href="{{route('categoria.edit', ['id' => $categoria->id])}}"
                                class="btn btn-primary">Editar</a>
                            <a href="{{route('categoria.delete', ['id' => $categoria->id] )}}"
                                class="btn btn-danger">Borrar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection