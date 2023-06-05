<?php

namespace App\Http\Controllers;

use App\Models\Candidato;
use App\Models\Vacante;
use Illuminate\Http\Request;

class CandidatoController extends Controller{
    
    public function index(Vacante $vacante){
        return view('candidatos.index', compact('vacante'));
    }

}
