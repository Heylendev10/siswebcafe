<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {

            $user = Auth::user();

            //guardamos en sesion las variables del layout
            $perfil = [
                'nombre' => $user->nombre,
                'rol' => $user->rol,
                'foto' => $user->foto,
            ];
            Session::put('perfil', $perfil);


            if($user->rol == 'Administrador'){
                return redirect('usuarios');
            }
            elseif($user->rol == 'Supervisor'){
                return redirect('supervisor/fincas');
            }
            else{
                return redirect('logout');
            }

            //return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
	
	public function recuperarpassword(Request $request)
    {
		$user = User::where('email', $request->email)->first();
		
		if($user){
			
			$usereencrypt = encrypt($user->id);
			
			return redirect()->back()->with('success', 'Revisa tu correo para restablecer tu contraseña');
		}
		
		return redirect()->back()->with('error', 'No se encontro el Email en nuestro sistema');
	}
	
	public function cambiopassword(Request $request)
    {
		$useredecrypt = decrypt($user->id);
		
		$user = User::find($useredecrypt);
		
		if($user){
			
			if($request->password == $request->repetirpassword && $request->password){
				
				$user->password = $request->password;
				$user->save();
				
				return redirect()->back()->with('success', 'Tu nueva contraseña ha sido cambiada');
			}		
			
			return redirect()->back()->with('error', 'Contraseña y repetir contraseña deben ser iguales');
		}
		
		return redirect()->back()->with('error', 'Hubo un error intentalo de nuevo');
	}
	
	public function nuevapassword(Request $request, $id)
    {
		return view('auth.nuevapassword', compact('id'));
	}
}
