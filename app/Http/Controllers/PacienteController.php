<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Usuario;
use Illuminate\Support\Facades\Validator;

class PacienteController extends Controller
{
    protected function validator(array $data, $id = null)
    {
        return Validator::make($data, [
            'nombre' => 'required|string|max:255',
            'sexo' => 'required|string|max:255',
            'fechaNacimineto' => 'required|date',
            // Add other validation rules for fields in the Paciente model
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede exceder los 255 caracteres.',
            'sexo.required' => 'El campo sexo es obligatorio.',
            'sexo.string' => 'El campo sexo debe ser una cadena de texto.',
            'sexo.max' => 'El campo sexo no puede exceder los 255 caracteres.',
            'fechaNacimineto'=> 'fecha mal.',
            // Other custom error messages for validation
        ]);
    }

    public function index()
    {
        $pacientes = Paciente::all();
        $usuarios = Usuario::all(); // Obtén la lista de usuarios
        
        return view('paciente.index', compact('pacientes','usuarios'));
    }

    public function create()
    {
        $usuarios = Usuario::all(); // Obtén la lista de usuarios
        return view('paciente.create', compact('usuarios'));
       
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Paciente::create($request->all());

       
        
        return redirect()->route('paciente.index');
    }


    

    public function destroy($id)
    {
        Paciente::destroy($id);
        return redirect()->route('paciente.index');
    }

    public function edit($id)
    {
        $paciente = Paciente::find($id);
        $usuarios = Usuario::all(); // Obtén la lista de usuarios
        return view('paciente.edit', compact('paciente','usuarios'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $paciente = Paciente::find($id);
        $paciente->update($request->all());
        return redirect()->route('paciente.index');
    }
}
