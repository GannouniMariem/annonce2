<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\immobilier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerImmobilier extends Controller
{

    use GeneralTrait;

    public function index()
    {
        $immobiler = immobilier::get();

        return response()->json($immobiler);
    }



    public function create(Request $request)
    {
        $file_name = $this->saveImage($request->photo,'image');

        $immobiler = new immobilier();
        
        $immobiler->nom = $request->input('nom');
        $immobiler->description = $request->input('description');
        $immobiler->prix = $request->input('prix');
        $immobiler->photo = $file_name;
        $immobiler->localisation = $request->input('localisation');
        $immobiler->type_i = $request->input('type_i');
        $immobiler->surface = $request->input('surface');
        $immobiler->type_offre = $request->input('type_offre');
        $immobiler->nbr_chambre = $request->input('nbr_chambre');
        $immobiler->disponibilite = $request->input('disponibilite');
       
        $immobiler->save();

        return response()->json($immobiler);

    }


    public function show($id)
    {
        $immobiler = immobilier::find($id);

        return response()->json($immobiler);
    }


    public function update(Request $request)
    {
        $file_name = $this->saveImage($request->photo,'image');


        $immobiler = immobilier::find($request->id);
        $immobiler->nom = $request->input('nom');
        $immobiler->description = $request->input('description');
        $immobiler->prix = $request->input('prix');
        $immobiler->photo = $file_name;
        $immobiler->localisation = $request->input('localisation');
        $immobiler->type_i = $request->input('type_i');
        $immobiler->surface = $request->input('surface');
        $immobiler->type_offre = $request->input('type_offre');
        $immobiler->nbr_chambre = $request->input('nbr_chambre');
        $immobiler->disponibilite = $request->input('disponibilite');
        $immobiler->save();

        return response()->json($immobiler);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $immobiler = immobilier::find($id);
        $immobiler->delete();
        
        return $this->retournSuccessMessage('successfuly deleted');

    }
}
