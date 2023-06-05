<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Vacante;

class MostrarVacantes extends Component{

    protected $listeners = ['eliminarVacante'];

    public function eliminarVacante(Vacante $vacante){

        $vacante->delete();

        // Emitir respuesta de eliminado
        $this->emit('vacanteEliminada', true);
    }

    public function render(){
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(4);

        return view('livewire.mostrar-vacantes', compact('vacantes'));
    }
}
