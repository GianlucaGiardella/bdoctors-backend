<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        // se l'utente è loggato prendi l'id e successivamente se ha 0 profili creati, l'array sarà vuoto e restituisce la view dashboard
        $user_id = auth()->user()->id;
        $profile = Profile::where('user_id', $user_id)->get();
        if (count($profile)==0){
            $profile=[];
        };
        // view dashboard
        return view('admin.dashboard',compact('profile'));
    }
}
