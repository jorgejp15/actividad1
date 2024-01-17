<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Persona;
use App\Models\Docente;
use Illuminate\Support\Facades\Validator;

class DocenteController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'salario' => 'required|numeric',
            'fecha_de_ingreso' => 'required|date',
        ], [
            'salario.required' => 'El campo salario es obligatorio.',
            'salario.numeric' => 'El campo salario debe ser numérico.',
            'fecha_de_ingreso.required' => 'El campo fecha de ingreso es obligatorio.',
            'fecha_de_ingreso.date' => 'El campo fecha de ingreso debe ser una fecha válida.',
        ]);
    }

    public function index()
    {
        $docentes = Docente::all();
        $personas = Persona::all();
        

    
        return view('docente.index',compact('docentes','personas'));
      
    }

    public function show($id)
    { 
      
    
    }
    
    public function create()
    {
        $personas = Persona::all();
     

        return view('docente.create', compact('personas',));
       
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Docente::create($request->all());
        return redirect()->route('docente.index');
    }
    public function destroy($id)
    {
        Docente::destroy($id);
        return redirect()->route('docente.index');
      
    }
    public function edit($id)
{
    $docentes = Docente::findOrFail($id);
    $personas = Persona::all();
    

    return view('docente.edit', compact('docentes', 'personas'));
}

public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dato = Docente::find($id);
        $dato->update($request->all());
        return redirect()->route('docente.index');
    }




}
