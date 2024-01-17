<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Carrera;
use App\Models\Matricula;

class MatriculaController extends Controller
{
    
        public function index()
        {
            $matriculas = Matricula::all();
            $estudiantes = Estudiante::all();
            $carreras = Carrera::all();

            
    
        
            return view('matricula.index',compact('matriculas','estudiantes','carreras'));
          
        }
    
        public function show($id)
        { 
          
        
        }
        
        public function create()
        {
            $estudiantes = Estudiante::all();
            $carreras = Carrera::all();
    
            return view('matricula.create', compact('estudiantes','carreras'));
           
        }
    
        public function store(Request $request)
        {
            Matricula::create($request->all());
            return redirect()->route('matricula.index');
        }
        public function destroy($id)
        {
            Matricula::destroy($id);
            return redirect()->route('matricula.index');
          //  return $dato;
        }
        public function edit($id)
    {
        $matriculas = Matricula::findOrFail($id);
        $estudiantes = Estudiante::all();
        $carreras = Carrera::all();
        
    
        return view('matricula.edit', compact('matriculas', 'estudiantes','carreras'));
    }
    
    public function update(Request $request, $id)
    {
        
    
        $dato=Matricula::find($id);
        $dato->update($request->all());
        return redirect()->route('matricula.index');
    }
    
    
    
    
    
    
}
