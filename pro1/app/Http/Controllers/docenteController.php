<?php

namespace App\Http\Controllers;

use App\docente;
use Illuminate\Http\Request;

class docenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $docentes = docente::all();
        return $this->successResponse($docentes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'cargo' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'apellido' => 'required',
        ];
        $this->validate($request,$rules);
        
        $campos = $request->all();
        //dd($campos);
        $docente = docente::create($campos);
        return $this->successResponse($docente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function show(docente $docente)
    {
        return $this->successResponse($docente);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function edit(docente $docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, docente $docente)
    {
        $rules = [
            'email' => 'email',
        ];
        $this->validate($request,$rules);
        $docente->fill($request->all());

        if($docente->isClean()){
            return $this->errorResponse("No se hicieron cambios",422);
        }

        //dd($request);

        $docente->save();
        
        return $this->successResponse($docente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\docente  $docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(docente $docente)
    {
        $docente->delete();
        return $this->successResponse($docente);
    }
}
