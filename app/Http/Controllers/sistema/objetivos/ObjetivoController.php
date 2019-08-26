<?php

namespace App\Http\Controllers\sistema\objetivos;

use App\src\objetivos\objetivo\Objetivo;
use App\src\objetivos\indicador\Indicador;
use App\src\objetivos\meta\Meta;
use App\src\objetivos\iniciativa\Iniciativa;

use App\src\sistema\usuario\rol\Rol;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ObjetivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBsc(Request $request)
    {   
        $objetivosF = Objetivo::Search($request->buscar)->where('id_rol',2)->orderBy('nombre', 'ASC')->paginate(10);

        $objetivosG = Objetivo::Search($request->buscar)->where('id_rol',3)->orderBy('nombre', 'ASC')->paginate(10);

        $objetivosI = Objetivo::Search($request->buscar)->where('id_rol',4)->orderBy('nombre', 'ASC')->paginate(10);

        $objetivosS = Objetivo::Search($request->buscar)->where('id_rol',5)->orderBy('nombre', 'ASC')->paginate(10);


        return view('vendor.Drocha.sectores.bsc')->with('objetivosF', $objetivosF)->with('objetivosG', $objetivosG)->with('objetivosI', $objetivosI)->with('objetivosS', $objetivosS);
    }

    public function indexOb(Request $request)
    {   
        if((auth()->user()->id_rol)!=1){
        $objetivos = Objetivo::Search($request->buscar)->where('id_rol', auth()->user()->id_rol)->orderBy('nombre', 'ASC')->paginate(10);
        }
        else{
            $objetivos = Objetivo::Search($request->buscar)->orderBy('nombre', 'ASC')->paginate(10);
        }
        //dd(auth()->user()->Rol->nombre);

        return view('vendor.Drocha.sectores.index')->with('objetivos', $objetivos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('vendor.Drocha.sectores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $objetivo =  new Objetivo([
                'id_rol' => auth()->user()->id_rol,
                'nombre' =>$request->nombreObjetivo,
        ]); 

        $objetivo->save();

        foreach ( $request->nombreIndicador as $key) {
                
            $indicador= new Indicador([
                'id_objetivo' => $objetivo->id,
                'nombre' => $key,

                ]);

                $indicador->save();
        }
        foreach ( $request->nombreMeta as $key) {
                
            $meta= new Meta([
                'id_objetivo' => $objetivo->id,
                'nombre' => $key,

                ]);

                $meta->save();
        }
        foreach ( $request->nombreIniciativa as $key) {
                
            $iniciativa= new Iniciativa([

                'id_objetivo' => $objetivo->id,
                'nombre' => $key,

                ]);

                $iniciativa->save();
        }
        flash('Se ha creado el objetivo correctamente')->success()->important();
        return redirect()->route('objetivo.index');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $objetivo = Objetivo::find($id);
      
        return view('vendor.Drocha.sectores.edit')->with('objetivo', $objetivo);
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
        $objetivo = Objetivo::find($id);

        $objetivo ->fill([
                'nombre'=> $request->nombreObjetivo
        ]);

        $objetivo->save();

        foreach ( $request->nombreIndicadorH as $indice=>$key) {
                

            $indicador=  Indicador::find($key);

            $indicador ->fill([
                'nombre'=> $request->nombreIndicadorY[$indice]
             ]);
            $indicador->save();  
        }

        foreach ( $request->nombreMetaH as $indice=>$key) {
                

            $meta=  Meta::find($key);

            $meta ->fill([
                'nombre'=> $request->nombreMetaY[$indice]
             ]);
            $meta->save();  
        }

        foreach ( $request->nombreIniciativaH as $indice=>$key) {
                

            $iniciativa=  Iniciativa::find($key);

            $iniciativa ->fill([
                'nombre'=> $request->nombreIniciativaY[$indice]
             ]);
            $iniciativa->save();  
        }

        //aqui es donde se agregan las nuevas metas, indicadores e iniciativas
        if(!empty($request->nombreIndicador)){

        foreach ( $request->nombreIndicador as $key) {
                
            $indicador= new Indicador([
                'id_objetivo' => $objetivo->id,
                'nombre' => $key,

                ]);

             $indicador->save();
        }
        }

        if(!empty($request->nombreMeta)){

        foreach ( $request->nombreMeta as $key) {
                
            $meta= new Meta([
                'id_objetivo' => $objetivo->id,
                'nombre' => $key,

                ]);

             $meta->save();
        }
        }

        if(!empty($request->nombreIniciativa)){

        foreach ( $request->nombreIniciativa as $key) {
                
            $iniciativa= new Iniciativa([
                'id_objetivo' => $objetivo->id,
                'nombre' => $key,

                ]);

             $iniciativa->save();
        }
        }
        flash('Se ha modificado el objetivo correctamente')->success()->important();
        return redirect()->route('objetivo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objetivo = Objetivo::find($id);

        $objetivo->delete();
        flash('Objetivo eliminado correctamente', 'danger')->important();
        return redirect()->route('objetivo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyI($id, $id_objetivo)
    {
        $indicador = Indicador::find($id);
        $indicador->delete();
        flash('Usuario eliminado correctamente', 'danger')->important();
       return redirect()->route('objetivo.edit',$id_objetivo); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyM($id)
    {
        dd($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyIn($id)
    {
        dd($id);
    }
}
