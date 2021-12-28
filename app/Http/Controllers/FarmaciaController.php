<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Farmacia;


class FarmaciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req=$request->all();
        $data=array();
        $status=400;

        $datos= new \App\Services\Farmacia($req["nombre"],$req["direccion"],$req["latitud"],$req["longitud"]);
        $validaciones=$datos->validar_campos();

        if($validaciones["exito"]){
            $farmacia = new Farmacia;
            $farmacia->nombre=$datos->getNombre();
            $farmacia->direccion=$datos->getDireccion();
            $farmacia->latitud=$datos->getLatitud();
            $farmacia->longitud=$datos->getLongitud();
            $farmacia->save();
            $data["exito"]="Farmacia registrada";
            $data["id"]=$farmacia->id;
            $status=200;
        }else{
            $data["exito"]="error de campo";
            $data["campos"]=$validaciones;
            $status=500;
        }
        
        $data= \Response::json(['data' => $data, 'status' => $status], $status);
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=array();
        $status=400;

        $farmacia = Farmacia::find($id);

        if(!empty($farmacia)){
            
            $data["exito"]="Farmacia registrada";
            $data["farmacia"]=$farmacia;
            $status=200;
        }else{
            $data["exito"]="No exite farmacia";
            $status=500;
        }
        
        $data= \Response::json(['data' => $data, 'status' => $status], $status);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
