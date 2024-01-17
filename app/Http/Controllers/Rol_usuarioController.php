<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol_usuario;
use \App\Models\Usuario;
use Illuminate\Support\Facades\Validator;

class Rol_usuarioController extends Controller
{
    protected function validator(array $data, $id = null)
    {
        return Validator::make($data, [
            'nombreRol' => 'required|string|max:255',
        ], [
            'nombreRol.required' => 'El campo nombre del rol es obligatorio.',
            'nombreRol.string' => 'El campo nombre del rol debe ser una cadena de texto.',
            'nombreRol.max' => 'El campo nombre del rol no puede exceder los 255 caracteres.',
        ]);
    }

    public function index()
    {
        $roles = Rol_usuario::all();
        return view('rol_usuario.index', compact('roles'));
    }

    public function create()
    {
        $usuarios = Usuario::all(); // Obtén la lista de usuarios
        return view('rol_usuario.create', compact('usuarios'));
        
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        Rol_usuario::create([
            'nombreRol' => $request->nombreRol,
            'Usuario_id' => $request->Usuario_id, // Asegúrate de recibir este valor desde el formulario
        ]);
    
        return redirect()->route('rol_usuario.index');
    }

    public function destroy($Usuario_id)
    {
        Rol_usuario::where('Usuario_id', $Usuario_id)->delete();
        return redirect()->route('rol_usuario.index');
    }

    public function edit($Usuario_id) {
        $rol = Rol_usuario::where('Usuario_id', $Usuario_id)->first();
        return view('rol_usuario.edit', compact('rol'));
    }
    

    public function update(Request $request, $Usuario_id)
    {
       
        // Encuentra el rol a actualizar
        $rol = Rol_usuario::where('Usuario_id', $Usuario_id)->first();
    
        // Actualiza los campos del rol con los valores del formulario
        $rol->nombreRol = $request->nombreRol;
        
        $rol->save(); // Guarda los cambios
    
        return redirect()->route('rol_usuario.index');
    }
}
