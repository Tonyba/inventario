<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller {
    //

    public function add() {
        $categorias = Categoria::all();

        return view('producto.add', [
            'categorias' => $categorias,
        ]);
    }

    public function save(Request $request) {
        $validate = $request->validate([
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
            'descripcion' => 'string',
            'categoria' => 'required|string',
            'imagen' => 'mimes:jpg,png,gif,jpeg',
        ]);

        $imagen = $request->file('imagen');

        $producto = new Producto();
        $producto->nombre = $request->input('nombre');
        $producto->precio = $request->input('precio');
        $producto->descripcion = $request->input('descripcion');
        $producto->categoria_id = $request->input('categoria');
        $producto->imagen = null;
        $producto->stock = $request->input('stock');

        if ($imagen) {
            $image_path_name = time() . $imagen->getClientOriginalName();
            Storage::disk('productos')->put($image_path_name, File::get($imagen));
            $producto->imagen = $image_path_name;
        }

        $producto->save();

        return redirect()->route('home')->with([
            'mensaje' => 'El producto se ha añadido correctamente',
        ]);

    }

    public function getImage($filename) {
        $file = Storage::disk('productos')->get($filename);

        return new Response($file, 200);
    }

    public function detail($id) {
        $producto = Producto::find($id);

        return view('producto.detail', [
            'producto' => $producto,
        ]);
    }

    public function borrar($id) {
        $producto = Producto::find($id);
        Storage::disk('productos')->delete($producto->imagen);

        $producto->delete();

        return redirect()->route('home')->with([
            'message' => 'borrado exitosamente',
        ]);
    }

    public function editar($id) {
        $producto = Producto::find($id);
        $categorias = Categoria::all();

        return view('producto.edit', [
            'producto' => $producto,
            'categorias' => $categorias,

        ]);
    }

    public function actualizar(Request $request) {
        $validate = $request->validate([
            'nombre' => 'required|string',
            'precio' => 'required|numeric',
            'descripcion' => 'string',
            'categoria' => 'required|string',
            'imagen' => 'mimes:jpg,png,gif,jpeg',
        ]);

        $producto_id = $request->input('producto_id');
        $nombre = $request->input('nombre');
        $precio = $request->input('precio');
        $descripcion = $request->input('descripcion');
        $categoria = $request->input('categoria');
        $stock = $request->input('stock');
        $imagen = $request->file('imagen');

        $producto = Producto::find($producto_id);
        $producto->nombre = $nombre;
        $producto->precio = $precio;
        $producto->descripcion = $descripcion;
        $producto->categoria_id = $categoria;
        $producto->stock = $stock;

        if ($imagen) {
            $imagen_name = time() . $imagen->getClientOriginalName();
            Storage::disk('productos')->put($imagen_name, File::get($imagen));
            $image->imagen = $imagen_name;
        }

        $producto->update();

        return redirect()->route('producto.detail', ['id' => $producto_id])
            ->with(['message' => 'Producto actualizado correctamente']);

    }

}