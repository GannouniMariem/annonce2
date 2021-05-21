<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\annonce;
use App\Models\panier;
use Illuminate\Http\Request;

class ControllerPanier extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $panier = panier::get();

        return response()->json($panier);
    }



    public function create(Request $request)
    {
        $client = annonce::find($request->id_annonce);

        $panier = new panier();
        
        $panier->id_user = $request->input('id_annonce');
        $panier->id_ = $request->input('id_user');
        $panier->date = $request->input('date');
       
        $panier->save();

        return response()->json($panier);

    }


    public function show($id)
    {
        $panier = panier::find($id);

        return response()->json($panier);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $panier = panier::find($id);
        $panier->delete();

    }
}
