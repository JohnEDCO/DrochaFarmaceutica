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
    public function index(Request $request)
    {   
      
        return view('vendor.Drocha.sectores.index_objetivos');
    }

    public function indexF(Request $request)
    {   
        $objetivos = Objetivo::Search($request->buscar)->where('id_rol', auth()->user()->id_rol)->orderBy('nombre', 'ASC')->paginate(10);
        return view('vendor.Drocha.sectores.financiero.index')->with('objetivos', $objetivos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendor.Drocha.sectores.financiero.financiero');
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
      
        return view('vendor.Drocha.sectores.financiero.edit')->with('objetivo', $objetivo);
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
        dd($id);
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
