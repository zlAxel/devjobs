<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller{

    public function __construct(){
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('rol.reclutador');
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request){

        $notificaciones = auth()->user()->unreadNotifications;

        return view('notificaciones.index', compact('notificaciones'));
    }
}
