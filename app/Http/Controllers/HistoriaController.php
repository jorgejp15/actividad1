<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Historia;
use App\Models\Usuario;
use App\Models\Paciente;
use Illuminate\Support\Facades\Validator;

class HistoriaController extends Controller
{
    protected function validator(array $data, $id = null)
    {
        return Validator::make($data, [
            'fechaElaboracion' => 'required|date',
            'hora' => 'required',
            'descripcion' => 'required|string|max:255',
            'diagnostico' => 'required|string|max:255',
            'tratamiento' => 'required|string|max:255',
            // Add other validation rules for fields in the Historia model
        ], [
            'fechaElaboracion.required' => 'El campo fecha de elaboración es obligatorio.',
            'fechaElaboracion.date' => 'El campo fecha de elaboración debe ser una fecha válida.',
            'hora.required' => 'El campo hora es obligatorio.',
            'descripcion.required' => 'El campo descripción es obligatorio.',
            'descripcion.string' => 'El campo descripción debe ser una cadena de texto.',
            'descripcion.max' => 'El campo descripción no puede exceder los 255 caracteres.',
            'diagnostico.required' => 'El campo diagnóstico es obligatorio.',
            'diagnostico.string' => 'El campo diagnóstico debe ser una cadena de texto.',
            'diagnostico.max' => 'El campo diagnóstico no puede exceder los 255 caracteres.',
            'tratamiento.required' => 'El campo tratamiento es obligatorio.',
            'tratamiento.string' => 'El campo tratamiento debe ser una cadena de texto.',
            'tratamiento.max' => 'El campo tratamiento no puede exceder los 255 caracteres.',
            // Other custom error messages for validation
        ]);
    }

    public function index()
    {


        $historias = Historia::all();
        $usuarios = Usuario::all();
        $pacientes = Paciente::all(); // Obtén la lista de usuarios
        return view('historia.index', compact('historias','usuarios','pacientes'));
        
    }

    public function create()
    {
        $usuarios = Usuario::all(); // Obtén la lista de usuarios
        $pacientes = Paciente::all();
        return view('historia.create', compact('usuarios','pacientes'));
        
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $historia = new Historia();
        $historia->fechaElaboracion = $request->input('fechaElaboracion');
        $historia->hora = $request->input('hora');
        $historia->descripcion = $request->input('descripcion');
        $historia->diagnostico = $request->input('diagnostico');
        $historia->tratamiento = $request->input('tratamiento');
        $historia->paciente_id = $request->input('paciente_id');
        $historia->usuario_id = $request->input('usuario_id');
    
        // Otros campos si los hay
    
        $historia->save();
    
        return redirect()->route('historia.index');
    }
    

    public function destroy($id)
    {
        Historia::destroy($id);
        return redirect()->route('historia.index');
    }

    public function edit($id)
    {
        $historia = Historia::find($id);
        $usuarios = Usuario::all();
        $pacientes = Paciente::all();
        return view('historia.edit', compact('historia','usuarios','pacientes'));
        
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $historia = Historia::find($id);
        $historia->update($request->all());
        return redirect()->route('historia.index');
    }
}
