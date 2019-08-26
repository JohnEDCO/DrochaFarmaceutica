<?php

namespace App\Http\Controllers\sistema\usuario\rol;

use App\src\sistema\usuario\rol\Rol;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RolController extends Controller
{
    /**
     * Función que retorna todos los registros de la tabla de roles
     * @return mixed
     */
    public function index(Request $request)
    {
        $roles = Rol::Search($request->buscar)->where('habilitado', 1)->orderBy('nombre', 'ASC')->paginate(10);
        return view('vendor.Drocha.usuario.rol.index')->with('roles',$roles);
    }

    /**
     * Función que retorna la vista para crear un rol de usuario
     */
    public function create()
    {
        return view('vendor.Drocha.usuario.rol.create');
    }

    /**
     * Función que almacena un rol de usuario en la BD
     * @param RolRequest $request
     * @return mixed
     */
    public function store(Request $request)
    {
        $rol = new Rol($request->all());
        $rol -> save();
        flash('Se ha creado el rol correctamente','success')->important();
        return redirect()->route('rol.index');
    }

    /**
     * Función que retorna la vista del rol seleccionado para editar sus atributos
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $rol = Rol::find($id);
        return view('vendor.Drocha.usuario.rol.edit')->with('rol',$rol);
    }

    /**
     * Función que actualiza los datos de un rol en la Base de Datos
     * @param RolRequest $request
     * @param $id
     * @return mixed
     */
    public function update(Request $request,$id)
    {
        $rol = Rol::find($id);
        $rol -> fill($request->all());

        //si no se recibe el valor del campo habilitado se pone por defecto como deshabilitado el rol en 0
        if(!isset($request->habilitado))
        {
            $rol -> habilitado = 0;
        }
        
        $rol -> save();
        flash('Se ha actualizado el rol correctamente','success')->important();
        return redirect()->route('rol.index');
    }

    /**
     * Función que elimina un rol de la Base de Datos
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {

        $rol = Rol::find($id);

        //deshabilitado el rol en 0
        $rol -> habilitado = 0;
        $rol->save();
        flash(strtoupper($rol->nombre).', Se ha eliminado correctamente','danger')->important();
        return redirect()->route('rol.index');

    	
}}
