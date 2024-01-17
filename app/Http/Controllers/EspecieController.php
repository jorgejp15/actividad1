<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especie;
class EspecieController extends Controller
{
    public function index()
    {
        $especies = Especie::all();
    
        return view('especies.index',compact('especies'));
    }
    public function create()
    {
        return view('especies.create');
    }

    public function store(Request $request)
    {
        Especie::create($request->all());
        return redirect()->route('especie.index');
    }
    public function destroy($id)
    {
        especie::destroy($id);
        return redirect()->route('especie.index');
      //  return $dato;
    }
    public function edit($id)
    {
        $especies = Especie::find($id);
        return view('especies.edit',compact('especies'));
    }
    public function update(Request $request,$id)
    {
        
        $dato=Especie::find($id);
        $dato->update($request->all());
        return redirect()->route('especie.index');
        // $especies = Especie::find($id);
        // return view('especies.edit',compact('especies'));
    }
}
