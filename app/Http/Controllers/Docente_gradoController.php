<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;
use App\Models\Docente_grado;
use App\Models\Docente;
use Illuminate\Support\Facades\Validator;

class Docente_gradoController extends Controller
{
    protected function validator(array $data)
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
            $docente_grados = Docente_grado::all();
            $grados = Grado::all();
            $docentes = Docente::all();
    
        
            return view('docente_grado.index',compact('docente_grados','grados','docentes'));
      
    }

    public function show($id)
    { 
      
    
    }
    
    public function create()
    {
        $grados = Grado::all();
        $docentes = Docente::all();

        return view('docente_grado.create', compact('grados','docentes'));
       
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Docente_grado::create($request->all());
        return redirect()->route('docente_grado.index');
    }

    public function destroy($id)
    {
        Docente_grado::destroy($id);
        return redirect()->route('docente_grado.index');
     
    }
    public function edit($id)
{
    $docente_grados = Docente_grado::findOrFail($id);
    $grados = Grado::all();
    $docentes = Docente::all();
    

    return view('docente_grado.edit', compact('docente_grados', 'grados','docentes'));
}

public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dato = Docente_grado::find($id);
        $dato->update($request->all());
        return redirect()->route('docente_grado.index');
    }

}