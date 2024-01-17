<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use App\Models\Persona;

class PersonaController extends Controller
{
    protected function validator(array $data, $id = null)
    {
        return Validator::make($data, [
            'ci' => 'required|numeric|unique:personas,ci,' . $id,
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'sexo' => 'required|in:F,M', 
            'fecha_nacimiento' => 'required|date',
        ], [
            'ci.required' => 'El campo CI es obligatorio.',
            'ci.numeric' => 'El campo CI debe ser un número.',
            'ci.unique' => 'El CI ingresado ya existe en la base de datos.',
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede exceder los 255 caracteres.',
            'apellidos.required' => 'El campo apellidos es obligatorio.',
            'apellidos.string' => 'El campo apellidos debe ser una cadena de texto.',
            'apellidos.max' => 'El campo apellidos no puede exceder los 255 caracteres.',
            'sexo.required' => 'El campo sexo es obligatorio.',
            'sexo.in' => 'El campo sexo debe ser Femenino o Masculino.', 
            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es obligatorio.',
            'fecha_nacimiento.date' => 'El campo fecha de nacimiento debe ser una fecha válida.',
        ]);
    }
    public function index()
    {
        $personas = Persona::all();
    
        return view('persona.index',compact('personas'));
    }
    public function create()
    {
        return view('persona.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Persona::create($request->all());
        return redirect()->route('persona.index');
    }

    public function destroy($id)
    {
        Persona::destroy($id);
        return redirect()->route('persona.index');
   
    }
    public function edit($id)
    {
        $personas = Persona::find($id);
        return view('persona.edit',compact('personas'));
    }
    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dato = Persona::find($id);
        $dato->update($request->all());
        return redirect()->route('persona.index');
    }
}