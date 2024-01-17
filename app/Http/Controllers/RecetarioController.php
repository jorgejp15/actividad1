<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recetario;
use App\Models\Historia;
use Illuminate\Support\Facades\Validator;

class RecetarioController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // Add validation rules for fields in the Recetario model if needed
        ], [
            // Custom error messages for validation
        ]);
    }

    public function index()
    {
        $historias = Historia::all();
        $recetarios = Recetario::all();
        return view('recetario.index', compact('recetarios','historias'));
    }

    public function create()
    {
        $historias = Historia::all();
       
        return view('recetario.create', compact('historias'));
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Crear una nueva instancia de Recetario y asignar los campos específicos
        $recetario = new Recetario();
        $recetario->historia_id = $request->input('historia_id');
        // Asigna otros campos si es necesario
    
        // Guardar el recetario
        $recetario->save();
    
        return redirect()->route('recetario.index');
    }
    

    public function destroy($id)
    {
        Recetario::destroy($id);
        return redirect()->route('recetario.index');
    }

    public function edit($id)
    {
        $recetario = Recetario::find($id);
        $historias = Historia::all();
        return view('recetario.edit', compact('recetario','historias'));
    }

    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $recetario = Recetario::find($id);
        $recetario->update($request->all());
        return redirect()->route('recetario.index');
    }
}
