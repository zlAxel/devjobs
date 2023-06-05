<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;

use Livewire\WithFileUploads;

class CrearVacante extends Component{

    use WithFileUploads;

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required|numeric|between:1,9',
        'categoria' => 'required|numeric|between:1,7',
        'empresa' => 'required|string',
        'ultimo_dia' => 'required',
        'descripcion' => 'required|string',
        'imagen' => 'required|image|max:1024',
    ];

    public function crearVacante(){

        $datos = $this->validate();

        // Almacenar la imagen de la vacante

        $imagen     = $this->imagen->store('public/vacantes');
        $nombreImg = str_replace('public/vacantes/', '', $imagen);

        // Almacenar el registro de la vacante

        Vacante::create([
            'titulo' => $datos['titulo'],
            'salario_id' => $datos['salario'],
            'categoria_id' => $datos['categoria'],
            'empresa' => $datos['empresa'],
            'ultimo_dia' => $datos['ultimo_dia'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $nombreImg,
            'user_id' => auth()->user()->id,
        ]);

        // Crear mensaje de la creación

        session()->flash('mensaje', 'La vacante se ha publicado correctamente.');

        // Redireccionar al usuario

        return redirect()->route('vacantes.index');
    }

    public function render(){
        $salarios = Salario::all();
        $categorias = Categoria::all();
        $context = [
            "salarios" => $salarios,
            "categorias" => $categorias,
        ];
        return view('livewire.crear-vacante', $context);
    }
}
