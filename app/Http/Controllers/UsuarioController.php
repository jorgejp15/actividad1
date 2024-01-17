<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    protected function validator(array $data, $id = null)
    {
        return Validator::make($data, [
            'nombre' => 'required|string|max:30',
            'contrasena' => 'required|string|min:8',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede exceder los 30 caracteres.',
            'contrasena.required' => 'El campo contraseña es obligatorio.',
            'contrasena.string' => 'El campo contraseña debe ser una cadena de texto.',
            'contrasena.min' => 'La contraseña debe tener al menos 8 caracteres.',
        ]);
    }

    public function index()
    {
        $usuarios = Usuario::all();
        return view('usuario.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Usuario::create($request->all());
        return redirect()->route('usuario.index');
    }

    public function destroy($id)
    {
        Usuario::destroy($id);
        return redirect()->route('usuario.index');
    }

    public function edit($id)
    {
        $usuario = Usuario::find($id);
        return view('usuario.edit', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $usuario = Usuario::find($id);
        $usuario->update($request->all());
        return redirect()->route('usuario.index');
    }
}
