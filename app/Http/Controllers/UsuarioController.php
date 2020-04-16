<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); //verificamos que haya iniciado session
    }

    public function isAdmin()
    {
        if(Auth::user()->rol != 'Administrador'){
            return redirect()->back();
        }
    }

    public function usuarios()
    {
        $this->isAdmin();

        $usuarios = User::get();

        return view('usuarios.index', compact('usuarios'));
    }

    public function regristrarUsuario(Request $request)
    {
        $this->isAdmin();

        $existe = User::where('email',$request->email)->first();
        if($existe){
            return redirect()->back()->with('error','El email ya se encuentra registrado')->withInput();
        }
        $user = new User();

        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->documento = $request->documento;
        $user->rol = $request->rol;
        $user->fechanacimiento = $request->fechanacimiento;
        $user->genero = $request->genero;
        $user->email = $request->email;
        $user->password = $request->password;

        if($user->save()){
            return redirect()->back()->with('success','Se registro correctamente la información');
        }
        else{
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }
    }

    public function verUsuario($id)
    {
        $this->isAdmin();

        $user = User::find($id);
        if($user){
            return view('usuarios.verusuario', compact('user'));
        }
        else{
            return redirect()->back()->with('error','No se encontro el usuario');
        }
    }

    public function editUsuario($id)
    {
        $this->isAdmin();

        $user = User::find($id);
        if($user){
            return view('usuarios.editusuario', compact('user'));
        }
        else{
            return redirect()->back()->with('error','No se encontro el usuario');
        }
    }

    public function actualizarUsuario(Request $request)
    {
        $this->isAdmin();

        $existe = User::where('email',$request->email)->where('id','!=',$request->idusuario)->first();
        if($existe){
            return redirect()->back()->with('error','El email ya se encuentra registrado')->withInput();
        }
        $user = User::find($request->idusuario);

        if($user){
           $user->nombre = $request->nombre;
            $user->apellido = $request->apellido;
            $user->documento = $request->documento;
            $user->rol = $request->rol;
            $user->fechanacimiento = $request->fechanacimiento;
            $user->genero = $request->genero;
            $user->email = $request->email;
            $user->password = $request->password;

            if($user->save()){
                return redirect('usuarios')->with('success','Se registro correctamente la información');
            }
            else{
                return redirect()->back()->with('error','No se pudo actualizar la información')->withInput();
            } 
        }
        else{
                return redirect()->back()->with('error','No se encontro el usuario')->withInput();
            }        
    }

    public function editPerfil()
    {
        $this->isAdmin();

        $user = Auth::user();
        if($user){        
            return view('usuarios.editperfil', compact('user'));
        }
        else{
            return redirect()->back()->with('error','No se encontro la información');
        }
    }

    public function guardarPerfil(Request $request)
    {
        $this->isAdmin();

        $user = Auth::user();

        if(! $user){
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }

        if($request->password){
            if($request->repetirpassword){
                if($request->password == $request->repetirpassword){

                    if (! Hash::check($request->password_actual, $user->password))
                    {
                        return redirect()->back()->with('error','La contraseña actual no es correcta')->withInput();
                    }

                    $user->password = $request->password;
                    if($user->save()){

                    }
                    else{
                        return redirect()->back()->with('error','No se pudo guardar la información')->withInput();
                    }
                }
                else{
                    return redirect()->back()->with('error','Las contraseña no son iguales.')->withInput();
                }            
            }
            else{
                return redirect()->back()->with('error','Debes llenar el campo repetir contraseña')->withInput();
            }
        }

        
        $imagen = $request->imagen;
        if (!Empty($imagen)) {

            $img = \Image::make($imagen);
            $path = public_path() . '/perfil/';

            $nombre = time() . '.' . $imagen->getClientOriginalExtension();
            $img->save($path . $nombre);

            $user->foto = 'perfil/' . $nombre;
            if($user->save()){
                    $perfil = [
                        'nombre' => $user->nombre,
                        'rol' => $user->rol,
                        'foto' => $user->foto,
                    ];
                    Session::put('perfil', $perfil);

                    }
            else{
                return redirect()->back()->with('error','No se pudo guardar la información')->withInput();
            }
        }

        return redirect()->back()->with('success','Se actualizo correctamente la información');
    }
}
