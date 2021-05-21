<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\favoris;
use Illuminate\Http\Request;

class ControllerFavoris extends Controller
{
    use GeneralTrait;

    public function index($id)
    {
        $favoris = favoris::get()->where('id_user',$id);

        return response()->json($favoris);
    }



    public function create(Request $request)
    {
        $favoris = new favoris();
        
        $favoris->id_annonce = $request->input('id_annonce');
        $favoris->id_user = $request->input('id_user');
        $favoris->date = $request->input('date');
       
        $favoris->save();

        return response()->json($favoris);

    }


    public function show($id)
    {
        $favoris = favoris::find($id);

        return response()->json($favoris);
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $favoris = favoris::find($id);
        $favoris->delete();

        return $this->retournSuccessMessage('successfuly deleted');

    }

    
    public function destroyByIdUser($id)
    {
        favoris::where('id_user', $id)->delete();

        return $this->retournSuccessMessage('successfuly deleted');


    }
}
