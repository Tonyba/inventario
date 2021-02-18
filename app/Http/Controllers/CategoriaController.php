<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller {
    //
    public function index() {
        $categorias = Categoria::all();

        return view('categoria.index', [
            'categorias' => $categorias,
        ]);
    }

    public function add() {
        return view('categoria.add');
    }

    public function save(Request $request) {
        $validate = $request->validate([
            'nombre' => 'required|string|unique:categorias',
        ]);

        $categoria = new Categoria();
        $categoria->nombre = $request->input('nombre');

        $categoria->save();

        return redirect()->route('categoria.index')->with([
            'message' => 'La categoria se ha agregado correctamente',
        ]);
    }

    public function edit($id) {
        $categoria = Categoria::find($id);

        return view('categoria.edit', [
            'categoria' => $categoria,
        ]);
    }

    public function update(Request $request) {
        $validate = $request->validate([
            'nombre' => 'required|string|unique:categorias',
        ]);

        $categoria_id = $request->input('categoria_id');
        $nombre = $request->input('nombre');

        $categoria = Categoria::find($categoria_id);
        $categoria->nombre = $nombre;

        $categoria->update();

        return redirect()->route('categoria.index')->with([
            'message' => 'La categoria se ha agregado correctamente',
        ]);
    }

    public function delete($id) {
        $categoria = Categoria::find($id);

        $categoria->delete();

        return redirect()->route('categoria.index')->with([
            'message' => 'La categoria se ha borrado correctamente',
        ]);
    }
}