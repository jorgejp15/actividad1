<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Zoo;
class ZooController extends Controller
{
    public function index()
    {
        $zoos = Zoo::all();
    
        return view('zoo.index',compact('zoos'));
    }
    public function create()
    {
        return view('zoo.create');
    }

    public function store(Request $request)
    {
        Zoo::create($request->all());
        return redirect()->route('zoo.index');
    }
    public function destroy($id)
    {
        Zoo::destroy($id);
        return redirect()->route('zoo.index');
      //  return $dato;
    }
    public function edit($id)
    {
        $zoos = Zoo::find($id);
        return view('zoo.edit',compact('zoos'));
    }
    public function update(Request $request,$id)
    {
        $dato=Zoo::find($id);
        $dato->update($request->all());
        return redirect()->route('zoo.index');
        // Zoo::updated($request->all());
        // return redirect()->route('zoo.index');
        // $especies = Especie::find($id);
        // return view('especies.edit',compact('especies'));
    }
}
