<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($categoria = null, $search = null) {
        $categorias = Categoria::all();
        if (!empty($categoria) && $categoria) {
            $productos = Categoria::find($categoria)->producto;
            $currentCategoriaId = Categoria::find($categoria)->id;
        } else {
            if (!empty($search) && $search) {
                $productos = Producto::where('id', 'LIKE', '%' . $search . '%')
                    ->orWhere('nombre', 'LIKE', '%' . $search . '%')
                    ->orWhere('descripcion', 'LIKE', '%' . $search . '%')
                    ->orderBy('id', 'DESC')
                    ->paginate(9);
            } else {
                $productos = Producto::orderBy('id', 'DESC')->paginate(6);
            }
            $currentCategoriaId = 0;
        }

        return view('home', [
            'productos' => $productos,
            'categorias' => $categorias,
            'currentCategoriaId' => $currentCategoriaId,
        ]);
    }
}