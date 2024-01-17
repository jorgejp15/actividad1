<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Persona;
use Illuminate\Support\Facades\Validator;

class EstudianteController extends Controller
{
    protected function validator(array $data, $id = null)
    {
        return Validator::make($data, [
            'descripcion' => 'required|string',
            
        ], [
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
          
        ]);
    }
    public function index()
    {
        $estudiantes = Estudiante::all();
        $personas = Persona::all();
        return view('estudiante.index',compact('estudiantes','personas'));
      
    }

    public function show($id)
    { 

    }
    
    public function create()
    {
        $personas = Persona::all();
     

        return view('estudiante.create', compact('personas',));
       
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Estudiante::create($request->all());
        return redirect()->route('estudiante.index');
    }
    public function destroy($id)
    {
        Estudiante::destroy($id);
        return redirect()->route('estudiante.index');
   
    }
    public function edit($id)
{
    $estudiantes = Estudiante::findOrFail($id);
    $personas = Persona::all();
    return view('estudiante.edit', compact('estudiantes', 'personas'));
}
public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dato = Estudiante::find($id);
        $dato->update($request->all());
        return redirect()->route('estudiante.index');
    }
}
