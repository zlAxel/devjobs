<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vacante;

class VacanteController extends Controller{

    public function __construct(){
        $exeptions = ['show'];

        $this->middleware('auth')->except($exeptions);
        $this->middleware('verified')->except($exeptions);
        $this->middleware('rol.reclutador')->except($exeptions);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(){
        $this->authorize('viewAny', Vacante::class);
        return view('vacantes.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        $this->authorize('create', Vacante::class);
        return view('vacantes.create');
    }

    /**
     * Display the specified resource.
     */
    public function show(Vacante $vacante){
        return view('vacantes.show', compact('vacante'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante){
        
        $this->authorize('viewAny', Vacante::class);
        $this->authorize('update', $vacante);

        return view('vacantes.edit', compact('vacante'));
    }
}
