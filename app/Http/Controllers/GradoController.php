<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grado;
use Illuminate\Support\Facades\Validator;

class GradoController extends Controller
{
    protected function validator(array $data, $id = null)
    {
        return Validator::make($data, [
            'nombre' => 'required|string|max:15',
        ], [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.string' => 'El campo nombre debe ser una cadena de texto.',
            'nombre.max' => 'El campo nombre no puede exceder los 15 caracteres.',
        ]);
    }
    public function index()
    {
        $grados = Grado::all();
    
        return view('grado.index',compact('grados'));
    }
    public function create()
    {
        return view('grado.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Grado::create($request->all());
        return redirect()->route('grado.index');
    }
    public function destroy($id)
    {
        Grado::destroy($id);
        return redirect()->route('grado.index');
      
    }
    public function edit($id)
    {
        $grados = Grado::find($id);
        return view('grado.edit',compact('grados'));
    }
    public function update(Request $request, $id)
    {
        $validator = $this->validator($request->all(), $id);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $dato = Grado::find($id);
        $dato->update($request->all());
        return redirect()->route('grado.index');
    }
}