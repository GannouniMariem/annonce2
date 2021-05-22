<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\banne;
use Illuminate\Http\Request;

class ControllerBanne extends Controller
{
    use GeneralTrait;

    public function getByid_bloque($id)
    {
        $banne = banne::get()->where('id_bloque',$id);

        return response()->json($banne);
    }

    public function getByid_bloqueur($id)
    {
        $banne = banne::get()->where('id_bloqueur',$id);

        return response()->json($banne);
    }


    public function create(Request $request)
    {

        $banne = new banne();
        
        $banne->id_bloqueur = $request->input('id_bloqueur');
        $banne->id_bloque = $request->input('id_bloque');
        $banne->date = $request->input('date');
       
        $banne->save();

        return response()->json($banne);

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $banne = banne::find($id);
        $banne->delete();
        return $this->retournSuccessMessage('successfuly deleted');

    }

}
