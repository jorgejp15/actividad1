<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrera;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CarreraController extends Controller
{
    protected function validator(array $data, $id = null)
    {
        return Validator::make($data, [
            'nombre' => 'required|string|max:10',
            'descripcion' => 'required|string',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede exceder los 10 caracteres.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
        ]);
    }
    public function index()
    {
        $carreras = Carrera::all();
    
        return view('carrera.index',compact('carreras'));
    }
    public function create()
    {
        return view('carrera.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
            // Enviar los errores de validación de vuelta al formulario junto con los datos ingresados
        }

        Carrera::create($request->all());
        return redirect()->route('carrera.index');
    }
    
    
    public function destroy($id)
    {
        Carrera::destroy($id);
        return redirect()->route('carrera.index');
      
    }
    public function edit($id)
    {
        $carreras = Carrera::find($id);
    
        return view('carrera.edit',compact('carreras'));
    }
    public function update(Request $request,$id)
    {
        $dato=Carrera::find($id);
        $dato->update($request->all());
        return redirect()->route('carrera.index');
        
    }
}