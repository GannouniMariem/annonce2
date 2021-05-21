<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Models\client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ControllerClient extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = client::get();

        return response()->json($client);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $file_name = $this->saveImage($request->photo,'image');

        $client = new client();

        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->email = $request->input('email');
        $client->password = Hash::make($request->input('password'));
        $client->role = $request->input('role');
        $client->photo = $file_name;
        $client->proprietaire = $request->input('proprietaire');
        $client->rating = $request->input('rating');
        $client->telephone = $request->input('telephone');
        $client->date_naissance = $request->input('date_naissance');
       
        $client->save();

        return response()->json($client);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $client = client::find($id);

        return response()->json($client);
    }
    /**

     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $file_name = $this->saveImage($request->photo,'image');


        $client = client::find($request->id);
        $client->nom = $request->input('nom');
        $client->prenom = $request->input('prenom');
        $client->email = $request->input('email');
        $client->password = Hash::make($request->input('password'));
        $client->role = $request->input('role');
        $client->photo = $file_name;
        $client->proprietaire = $request->input('proprietaire');
        $client->rating = $request->input('rating');
        $client->telephone = $request->input('telephone');
        $client->date_naissance = $request->input('date_naissance');
        $client->save();

        return response()->json($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\client  $client
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $client = client::find($id);
        $client->delete();

        return $this->retournSuccessMessage('successfuly deleted');

    }

}
