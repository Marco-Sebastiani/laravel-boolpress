<?php

namespace App\Http\Controllers;

use App\Lead;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }

    public function contatti(){
        return view('guest.contatti');
    }

    public function contattiInviati(Request $request ){
        $data = $request-> all();
        // dd($data);
        $newLead= new Lead();
        $newLead->fill($data);
        $newLead->save();
        return redirect()->route('guest.contatti.inviato')->with('status', 'Messaggio inviato correttamente');
    }

    public function contattiInviato(){
        return view('guest.inviato');
    }

}
