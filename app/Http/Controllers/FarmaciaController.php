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
    public function index(Request $request)
    {
        $req=$request->all();
        $data=array();
        $status=400;
        
        //validamos los campos ingresados por get
        $validacion_lat=\App\Services\Farmacia::campo_numerico($req["latitud"],"Campo Lat numerico");
        $validacion_lon=\App\Services\Farmacia::campo_numerico($req["longitud"],"Campo Lon numerico");
        
        // si pasa la validacion
        if($validacion_lat["validacion"] && $validacion_lon["validacion"]){


            $listado_farmacias=array();
            //coordenadas punto 1 
            $p1["latitud"]=$req["latitud"];
            $p1["longitud"]=$req["longitud"];

            //obtenemos las farmacias registradas
            $farmacias = Farmacia::all();

            if(count($farmacias)>0){
                foreach ($farmacias as $f){
                    //obtenemos las cordenadas para poder calcular el punto 2 
                    $p2["latitud"]=$f->latitud;
                    $p2["longitud"]=$f->longitud;
    
                    //calculo distancia
                    $distancia=\App\Services\Farmacia::calculo_distancia($p1,$p2);
                    
                    $farmacia=array(
                        "distancia"=>intval($distancia),
                        "farmacia"=>$f
                    );
                    
                    //cargamo la distacia
                    array_push($listado_farmacias,$farmacia);
    
                }
    
                //calculamos la minima distancia
                $minima_distancia=\App\Services\Farmacia::min_by_key($listado_farmacias,"distancia");
                
                // obtenemos la key del listado que tiene la menor distancia
                $key = array_search($minima_distancia, array_column($listado_farmacias, 'distancia'));
                           
                //mostramos la farmacia mas proxima en metros y los datos de la farmacia
                $data["exito"]="Farmacia registrada mas proxima a ".$listado_farmacias[$key]["distancia"]." metros";
                $data["farmacia"]=$listado_farmacias[$key]["farmacia"];
    
                $status=200;


            }else{
                $data["exito"]="No hay farmacias cargadas";
   
                $status=200;
            }

            
        }else{
            $data["exito"]="error de campo";
            $data["latitud"]=$validacion_lat;
            $data["longitud"]=$validacion_lon;
            $status=500;
        }
        
        $data= \Response::json(['data' => $data, 'status' => $status], $status);
        return $data;
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
