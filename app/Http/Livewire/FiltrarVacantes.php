<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Salario;
use App\Models\Categoria;

class FiltrarVacantes extends Component{

    public $termino;
    public $categoria;
    public $salario;

    public function leerDatos(){
        $this->emit('filtrarBusqueda', $this->termino, $this->categoria, $this->salario);
    }

    public function render(){

        $salarios = Salario::all();
        $categorias = Categoria::all();

        $context = [
            'salarios' => $salarios,
            'categorias' => $categorias,
        ];

        return view('livewire.filtrar-vacantes', $context);
    }

}
