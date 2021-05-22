<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\mobilier;
use Illuminate\Http\Request;

class ControllerMobilier extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $mobilier = mobilier::get();

        return response()->json($mobilier);
    }



    public function create(Request $request)
    {
        $file_name = $this->saveImage($request->photo,'image');

        $Mobilier = new mobilier();
        
        $Mobilier->nom = $request->input('nom');
        $Mobilier->description = $request->input('description');
        $Mobilier->prix = $request->input('prix');
        $Mobilier->photo = $file_name;
        $Mobilier->type_m = $request->input('type_m');
        $Mobilier->etat = $request->input('etat');
        $Mobilier->id_user = $request->input('id_user');
       
        $Mobilier->save();

        return response()->json($Mobilier);

    }


    public function show($id)
    {
        $Mobilier = mobilier::find($id);

        return response()->json($Mobilier);
    }


    public function update(Request $request)
    {
        $file_name = $this->saveImage($request->photo,'image');


        $Mobilier = mobilier::find($request->id);
        $Mobilier->nom = $request->input('nom');
        $Mobilier->description = $request->input('description');
        $Mobilier->prix = $request->input('prix');
        $Mobilier->photo = $file_name;
        $Mobilier->type_m = $request->input('type_m');
        $Mobilier->etat = $request->input('etat');
        $Mobilier->save();

        return response()->json($Mobilier);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $Mobilier = mobilier::find($id);
        $Mobilier->delete();
        return $this->retournSuccessMessage('successfuly deleted');

    }

}
