<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Vacante;

class HomeVacantes extends Component{

    protected $listeners = ['filtrarBusqueda'];

    public $termino;
    public $categoria;
    public $salario;

    public function filtrarBusqueda($termino, $categoria, $salario){
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
    }

    public function render(){

        // $vacantes = Vacante::all();
        $vacantes = Vacante::when($this->termino, function ($query){
            $query->where('titulo', 'LIKE', "%" . $this->termino . "%");
        })
        ->when($this->termino, function ($query){
            $query->orWhere('empresa', 'LIKE', "%" . $this->termino . "%");
        })
        ->when($this->categoria, function ($query){
            $query->where('categoria_id', 'LIKE', $this->categoria);
        })
        ->when($this->salario, function ($query){
            $query->where('salario_id', 'LIKE', $this->salario);
        })
        ->paginate(10);

        return view('livewire.home-vacantes', compact('vacantes'));
    }

}
