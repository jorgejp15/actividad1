<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Usuario;
use App\Models\Paciente;
use Illuminate\Support\Facades\Validator;

class CitaController extends Controller
{
    protected function validator(array $data, $id = null)
    {
        return Validator::make($data, [
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivoConsulta' => 'required|string|max:255',
            // Add other validation rules for fields in the Cita model
        ], [
            'fecha.required' => 'El campo fecha es obligatorio.',
            'fecha.date' => 'El campo fecha debe ser una fecha válida.',
            'hora.required' => 'El campo hora es obligatorio.',
            'motivoConsulta.required' => 'El campo motivo de consulta es obligatorio.',
            'motivoConsulta.string' => 'El campo motivo de consulta debe ser una cadena de texto.',
            'motivoConsulta.max' => 'El campo motivo de consulta no puede exceder los 255 caracteres.',
            // Other custom error messages for validation
        ]);
    }

    public function index()
    {
        $citas = Cita::all();
        $usuarios = Usuario::all();
        $pacientes = Paciente::all(); // Obtén la lista de usuarios
        return view('cita.index', compact('citas','usuarios','pacientes'));
        
    }

    public function create()
    {
        $usuarios = Usuario::all(); // Obtén la lista de usuarios
        $pacientes = Paciente::all();
        return view('cita.create', compact('usuarios','pacientes'));
        
        
    }

    public function store(Request $request)
{
    $validator = $this->validator($request->all());

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Crear una nueva instancia de Cita y asignar los valores manualmente
    $cita = new Cita();
    $cita->fecha = $request->input('fecha');
    $cita->hora = $request->input('hora');
    $cita->motivoConsulta = $request->input('motivoConsulta');
    // ... otros campos de la cita ...
    
    $cita->Usuario_id = $request->input('usuario_id'); // Asignar el Usuario_id
    $cita->Paciente_id = $request->input('paciente_id');

    $cita->save(); // Guardar la nueva cita en la base de datos

    return redirect()->route('cita.index');
}


    public function destroy($id)
    {
        Cita::destroy($id);
        return redirect()->route('cita.index');
    }

    public function edit($id)
    {
        $cita = Cita::find($id);
        $usuarios = Usuario::all();
        $pacientes = Paciente::all();
        return view('cita.edit', compact('cita','usuarios','pacientes'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $cita = Cita::find($id);
        $cita->update($request->all());
        return redirect()->route('cita.index');
    }
}
