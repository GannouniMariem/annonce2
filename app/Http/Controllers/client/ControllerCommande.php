<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\commande;
use Illuminate\Http\Request;

class ControllerCommande extends Controller
{
    use GeneralTrait;

    public function index($id)
    {
        $commande = commande::get()->where('id_user',$id);

        return response()->json($commande);
    }


    
    public function create(Request $request)
    {
        $commande = new commande();
        
        $commande->id_mobilier = $request->input('id_mobilier');
        $commande->mode_de_paiment = $request->input('mode_de_paiment');
        $commande->date = $request->input('date');
        $commande->totla = $request->input('totla');
        $commande->adress = $request->input('adress');
        $commande->postal = $request->input('postal');
        $commande->id_user = $request->input('id_user');
       
        $commande->save();

        return response()->json($commande);

    }

    public function destroy($id)
    {
        $commande = commande::find($id);
        $commande->delete();

        return $this->retournSuccessMessage('successfuly deleted');

    }

}
