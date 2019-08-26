<?php

namespace App\Http\Controllers\sistema\usuario\usuario;

use App\src\sistema\usuario\rol\Rol;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\usuario\UserRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usuarios = User::Search($request->buscar)->where('habilitado', 1)->orderBy('name', 'ASC')->paginate(10);
        return view('vendor.Drocha.usuario.usuario.index')->with('usuarios', $usuarios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Rol::orderBy('nombre', 'ASC')->pluck('nombre', 'id');
        return view('vendor.Drocha.usuario.usuario.create')->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();
        flash('Se ha creado el usuario correctamente')->success()->important();
        return redirect()->route('user.index');
        
        /*
      $user = new User([
            'name'=> $request->name,
            'email'=>$request->email,
            'password' => bcrypt($request->password)
        ]);

        $user->save();

        $$libro = new Libro([
            'nombre'=> $request->nombre_libro,
            'fecha'=>$request->fehca_libro
        ]);
        */

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
        $roles = Rol::orderBy('nombre', 'ASC');
        $roles = $roles->pluck('nombre', 'id');

        $user = User::find($id);

        return view('vendor.Drocha.usuario.usuario.edit')->with('roles', $roles)
            ->with('user', $user);
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
        $user = User::find($id);

        /**
         * Guardamos el password que el usuario tiene en la base de datos, en caso de que
         * no se vaya a cambiar la contraseña
         */
        $password = $user->password;

        $user->fill($request->all());

        /**
         * Comprobamos que el usuario no haya cambiado la contraseña para asignar la misma que tenía
         */
        if ($request->password == NULL) {
            $user->password = $password;
        } else {
            $user->password = bcrypt($request->password);
        }

        /**
         * Comprobamos si el checkbox de habilitado está deshabilitado para asignar el valor de cero
         */
        if (!isset($request->habilitado)) {
            $user->habilitado = 0;
        }


        $user->save();
        flash('Se ha actualizado el usuario correctamente', 'success')->important();
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->habilitado = 0;
        $user->save();
        flash('Usuario eliminado correctamente', 'danger')->important();
        return redirect()->route('user.index');
    }

    /**
     *Función que retorna una vista para editar perfil
     * @param $id el id del usuario
     * @return mixed
     */
    public function perfil()
    {
        $user = Auth::user();

        return view('vendor.Drocha.usuario.usuario.actualizar')->with('user', $user);
    }

    /**
     *Función que retorna una vista para editar un usuario
     * @param $id el id del usuario
     * @return mixed
     */
    public function actualizarPerfil(Request $request, $id)
    {
        $user = User::find($id);

        /**
         * Guardamos el password que el usuario tiene en la base de datos, en caso de que
         * no se vaya a cambiar la contraseña
         */
        $password = $user->password;

        $user->fill($request->all());

        /**
         * Comprobamos que el usuario no haya cambiado la contraseña para asignar la misma que tenía
         */
        if ($request->password == NULL) {
            $user->password = $password;
        } else {
            $user->password = bcrypt($request->password);
        }

        $user->save();
        flash('Se ha actualizado el usuario correctamente', 'success')->important();
        return redirect()->route('user.perfil');
    }
}
