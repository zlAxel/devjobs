<?php

namespace App\Http\Livewire;

use App\Models\Vacante;

use App\Notifications\NuevoCandidato;
use Livewire\Component;

use Livewire\WithFileUploads;

class PostularVacante extends Component{

    use WithFileUploads;

    public $vacante;
    public $cv;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante){
        $this->vacante = $vacante;
    }

    public function postularme(){

        $datos = $this->validate();

        // Guardar CV

        $cv        = $this->cv->store('public/cv');
        $nombreCv = str_replace('public/cv/', '', $cv);

        // Crear candidato a la vacante

        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $nombreCv
        ]);

        // Crear notificación y enviar email

        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo, auth()->user()->id));

        // Mostrar mensaje de ok

        session()->flash('mensaje', 'Se envió correctamete tu información, suerte!');

        return redirect()->back();
    }

    public function render(){
        return view('livewire.postular-vacante');
    }
}
