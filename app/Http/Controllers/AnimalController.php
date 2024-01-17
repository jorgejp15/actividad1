<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Especie;
use App\Models\Zoo;

class AnimalController extends Controller
{
    public function index()
    {
        $animals = Animal::all();
    
        return view('animal.index',compact('animals'));
        //$animals = Animal::with('especie')->get();

       // return view('animal.index', compact('animals'));
    }

    public function show($id)
    { 
      
    
    }
    
    public function create()
    {
        $zoos = Zoo::all(); // Obtén todos los zoológicos
        $especies = Especie::all(); // Obtén todas las especies

        return view('animal.create', compact('zoos', 'especies'));
        //return view('animal.create');
    }

    public function store(Request $request)
    {
        Animal::create($request->all());
        return redirect()->route('animal.index');
    }
    public function destroy($id)
    {
        Animal::destroy($id);
        return redirect()->route('animal.index');
      //  return $dato;
    }
    public function edit($id)
{
    $animals = Animal::findOrFail($id);
    $zoos = Zoo::all();
    $especies = Especie::all();

    return view('animal.edit', compact('animals', 'zoos', 'especies'));
}

public function update(Request $request, $id)
{
    // Validación de los datos
    $request->validate([
        'zoo_id' => 'required',
        'especie_id' => 'required',
        'sexo' => 'required',
        'añonacim' => 'required|date',
        'pais' => 'required',
        'continente' => 'required',
        // Otros campos y reglas de validación...
    ]);

    // Encontrar el animal por su ID
    $animals = Animal::findOrFail($id);

    // Actualizar los campos
    $animals->update([
        'zoo_id' => $request->input('zoo_id'),
        'especie_id' => $request->input('especie_id'),
        'sexo' => $request->input('sexo'),
        'añonacim' => $request->input('añonacim'),
        'pais' => $request->input('pais'),
        'continente' => $request->input('continente'),
        // Otros campos...
    ]);

    // Redireccionar a la vista de índice (index) después de la actualización
    return redirect()->route('animal.index')->with('success', 'Animal actualizado exitosamente.');
}




}
