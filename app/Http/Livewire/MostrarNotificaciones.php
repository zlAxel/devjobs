<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MostrarNotificaciones extends Component{

    public $notificaciones;
    public $notificationId;

    public function markNotificationAsRead($notificationId){
        // dd($notificationId);
        $notification = auth()->user()->notifications()->where('id', $notificationId)->first();
        if ($notification) {
            $notification->markAsRead();
            $this->notificaciones = auth()->user()->unreadNotifications;
        }
    }

    public function render(){
        return view('livewire.mostrar-notificaciones');
    }
}
