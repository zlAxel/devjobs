<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;

use Livewire\Component;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;

use Livewire\WithFileUploads;

class EditarVacante extends Component{

    use WithFileUploads;

    public $vacante_id;
    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;
    public $imagen_nueva;

    protected $rules = [
        'titulo' => 'required|string',
        'salario' => 'required|numeric|between:1,9',
        'categoria' => 'required|numeric|between:1,7',
        'empresa' => 'required|string',
        'ultimo_dia' => 'required',
        'descripcion' => 'required|string',
    ];

    // Nuevas reglas de validación

    public function rules(){
        $rules_extra = [
            'imagen_nueva' => 'required|image|max:1024',
        ];

        if (!$this->imagen) {
            return $rules_extra + $this->rules;
        } else {
            return $this->rules;
        }
    }
    
    public function mount(Vacante $vacante){
        $this->vacante_id = $vacante->id;
        $this->titulo       = $vacante->titulo;
        $this->salario     = $vacante->salario_id;
        $this->categoria   = $vacante->categoria_id;
        $this->empresa    = $vacante->empresa;
        $this->ultimo_dia   = $vacante->ultimo_dia->format('Y-m-d');
        $this->descripcion = $vacante->descripcion;
        $this->imagen      = $vacante->imagen;
    }

    public function editarVacante(){
        $datos = $this->validate();

        // Verificar si existe imagen nueva

        if($this->imagen_nueva){
            $imagen_save = $this->imagen_nueva->store('public/vacantes');
            $nombreImg   = str_replace('public/vacantes/', '', $imagen_save);
        }

        // Encontrar la vacante para editar

        $data_vacante = Vacante::find($this->vacante_id);

        // Asignar los valores

        $data_vacante->titulo = $datos['titulo'];
        $data_vacante->salario_id = $datos['salario'];
        $data_vacante->categoria_id = $datos['categoria'];
        $data_vacante->empresa = $datos['empresa'];
        $data_vacante->ultimo_dia = $datos['ultimo_dia'];
        $data_vacante->descripcion = $datos['descripcion'];
        $data_vacante->imagen = $nombreImg ?? $this->imagen;

        // Guardar la vacante

        $data_vacante->save();

        // Redireccionar

        session()->flash('mensaje', 'La vacante ('.$datos['titulo'].') ha sido actualizada correctamente.');

        return redirect()->route('vacantes.index');
    }

    public function eliminarImagen(){

        Storage::delete('public/vacantes/' .  $this->imagen);

        $data_vacante = Vacante::find($this->vacante_id);
        $data_vacante->imagen = NULL;
        $data_vacante->save();

        $this->imagen = NULL;
    }

    public function render(){
        $salarios = Salario::all();
        $categorias = Categoria::all();
        $context = [
            "salarios" => $salarios,
            "categorias" => $categorias,
        ];

        return view('livewire.editar-vacante', $context);
    }
}
