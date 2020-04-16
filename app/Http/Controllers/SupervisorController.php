<?php

namespace App\Http\Controllers;

use App\Cosecha;
use App\Cultivo;
use App\Exports\ExcelExport;
use App\Siembra;
use App\UsuarioFinca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Finca;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class SupervisorController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function isSupervisor()
    {
        if(Auth::user()->rol != 'Supervisor'){
            return redirect()->back();
        }
    }

    public function fincas()
    {
        $this->isSupervisor();

        $supervisor = Auth::user();

        $fincas = UsuarioFinca::select('finca.nombre', 'finca.municipio', 'finca.id', 'finca.direccion')
                    ->join('finca', 'finca.id', '=', 'usuario_finca.finca_id')
                    ->where('usuario_finca.user_id', $supervisor->id)
                    ->where('usuario_finca.fechafin', NULL)
                    ->get();

        return view('supervisorfinca.index', compact('fincas'));
    }

    public function origenGeografico($id)
    {
        $this->isSupervisor();

        $finca = Finca::find($id);
        if($finca){
            return view('supervisorfinca.origengeografico', compact('finca'));
        }
        else{
            return redirect()->back()->with('error','No se encontro la finca');
        }
    }

    public function cosechaFinca($id)
    {
        $this->isSupervisor();

        $finca = Finca::find($id);
        if($finca){
            $cosechas = Cosecha::where('finca_id', $finca->id)->get();
            return view('supervisorfinca.cosecha', compact('cosechas', 'finca'));
        }
        else{
            return redirect()->back()->with('error','No se encontro la finca');
        }
    }

    public function regristrarCosecha(Request $request)
    {
        $this->isSupervisor();

        $cosecha = new Cosecha();

        $cosecha->fecha = $request->fecha;
        $cosecha->aspecto = $request->aspecto;
        $cosecha->color = $request->color;
        $cosecha->porcefrutomaduro = $request->porcefrutomaduro;
        $cosecha->porcefrutodañadobroca = $request->porcefrutodañadobroca;
        $cosecha->tiposrecoleccion = $request->tiposrecoleccion;
        $cosecha->condicionesclimaticas = $request->condicionesclimaticas;
        $cosecha->nombreresponsable = $request->nombreresponsable;
        $cosecha->finca_id = $request->idfinca;

        if($cosecha->save()){
            $imagen = $request->imagen;
            if (!Empty($imagen)) {

                $img = \Image::make($imagen);
                $path = public_path() . '/images/';

                $nombre = time() . '.' . $imagen->getClientOriginalExtension();
                $img->save($path . $nombre);

                $cosecha->imagen = 'images/' . $nombre;
                $cosecha->save();
            }

            return redirect()->back()->with('success','Se registro correctamente la información');
        }
        else{
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }
    }

    public function infoCosecha($id)
    {
        $this->isSupervisor();

        $cosecha = Cosecha::find($id);
        if($cosecha){
            return view('supervisorfinca.infocosecha', compact('cosecha'));
        }
        else{
            return redirect()->back()->with('error','No se encontro la cosecha');
        }
    }

    public function editCosecha($id)
    {
        $this->isSupervisor();

        $cosecha = Cosecha::find($id);
        if($cosecha){
            return view('supervisorfinca.editcosecha', compact('cosecha'));
        }
        else{
            return redirect()->back()->with('error','No se encontro la cosecha');
        }
    }

    public function actualizarCosecha(Request $request)
    {
        $this->isSupervisor();

        $cosecha = Cosecha::find($request->idcosecha);

        if(! $cosecha){
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }

        $cosecha->fecha = $request->fecha;
        $cosecha->aspecto = $request->aspecto;
        $cosecha->color = $request->color;
        $cosecha->porcefrutomaduro = $request->porcefrutomaduro;
        $cosecha->porcefrutodañadobroca = $request->porcefrutodañadobroca;
        $cosecha->tiposrecoleccion = $request->tiposrecoleccion;
        $cosecha->condicionesclimaticas = $request->condicionesclimaticas;
        $cosecha->nombreresponsable = $request->nombreresponsable;

        if($cosecha->save()){
            $imagen = $request->imagen;
            if (!Empty($imagen)) {

                $img = \Image::make($imagen);
                $path = public_path() . '/images/';

                $nombre = time() . '.' . $imagen->getClientOriginalExtension();
                $img->save($path . $nombre);

                $cosecha->imagen = 'images/' . $nombre;
                $cosecha->save();
            }

            return redirect('cosechafinca/'.$cosecha->finca_id)->with('success','Se registro correctamente la información');
        }
        else{
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }
    }

    public function siembraFinca($id)
    {
        $this->isSupervisor();

        $finca = Finca::find($id);
        if($finca){
            $siembras = Siembra::where('finca_id', $finca->id)->get();
            return view('supervisorfinca.siembra', compact('siembras', 'finca'));
        }
        else{
            return redirect()->back()->with('error','No se encontro la finca');
        }
    }

    public function regristrarSiembra(Request $request)
    {
        $this->isSupervisor();

        $siembra = new Siembra();

        $siembra->variedadcafe = $request->variedadcafe;
        $siembra->analisissuelo = $request->analisissuelo;
        $siembra->proveedorsemilla = $request->proveedorsemilla;
        $siembra->sistemariego = $request->sistemariego;
        $siembra->preparacionterreno = $request->preparacionterreno;
        $siembra->germinador = $request->germinador;
        $siembra->fechaalmacigo = $request->fechaalmacigo;
        $siembra->nutricion = $request->nutricion;
        $siembra->fechaplagas = $request->fechaplagas;
        $siembra->nombremanejoplagas = $request->nombremanejoplagas;
        $siembra->controlutilizadoplagas = $request->controlutilizadoplagas;
        $siembra->fechamanejoenfermedades = $request->fechamanejoenfermedades;
        $siembra->nombremanejoenfermedades = $request->nombremanejoenfermedades;
        $siembra->controlutilizadoenfermedades = $request->controlutilizadoenfermedades;
        $siembra->finca_id = $request->idfinca;

        if($siembra->save()){
            $imagen = $request->imagen;
            if (!Empty($imagen)) {

                $img = \Image::make($imagen);
                $path = public_path() . '/images/';

                $nombre = time() . '.' . $imagen->getClientOriginalExtension();
                $img->save($path . $nombre);

                $siembra->imagen = 'images/' . $nombre;
                $siembra->save();
            }

            return redirect()->back()->with('success','Se registro correctamente la información');
        }
        else{
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }
    }

    public function infoSiembra($id)
    {
        $this->isSupervisor();

        $siembra = Siembra::find($id);
        if($siembra){
            return view('supervisorfinca.infosiembra', compact('siembra'));
        }
        else{
            return redirect()->back()->with('error','No se encontro la siembra');
        }
    }

    public function editSiembra($id)
    {
        $this->isSupervisor();

        $siembra = Siembra::find($id);
        if($siembra){
            return view('supervisorfinca.editsiembra', compact('siembra'));
        }
        else{
            return redirect()->back()->with('error','No se encontro la siembra');
        }
    }

    public function actualizarSiembra(Request $request)
    {
        $this->isSupervisor();

        $siembra = Siembra::find($request->idsiembra);

        if(! $siembra){
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }

        $siembra->variedadcafe = $request->variedadcafe;
        $siembra->analisissuelo = $request->analisissuelo;
        $siembra->proveedorsemilla = $request->proveedorsemilla;
        $siembra->sistemariego = $request->sistemariego;
        $siembra->preparacionterreno = $request->preparacionterreno;
        $siembra->germinador = $request->germinador;
        $siembra->fechaalmacigo = $request->fechaalmacigo;
        $siembra->nutricion = $request->nutricion;
        $siembra->fechaplagas = $request->fechaplagas;
        $siembra->nombremanejoplagas = $request->nombremanejoplagas;
        $siembra->controlutilizadoplagas = $request->controlutilizadoplagas;
        $siembra->fechamanejoenfermedades = $request->fechamanejoenfermedades;
        $siembra->nombremanejoenfermedades = $request->nombremanejoenfermedades;
        $siembra->controlutilizadoenfermedades = $request->controlutilizadoenfermedades;

        if($siembra->save()){
            $imagen = $request->imagen;
            if (!Empty($imagen)) {

                $img = \Image::make($imagen);
                $path = public_path() . '/images/';

                $nombre = time() . '.' . $imagen->getClientOriginalExtension();
                $img->save($path . $nombre);

                $siembra->imagen = 'images/' . $nombre;
                $siembra->save();
            }

            return redirect('siembrafinca/'.$siembra->finca_id)->with('success','Se registro correctamente la información');
        }
        else{
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }
    }

    public function cultivoFinca($id)
    {
        $this->isSupervisor();

        $finca = Finca::find($id);
        if($finca){
            $cultivos = Cultivo::where('finca_id', $finca->id)->get();
            return view('supervisorfinca.cultivo', compact('cultivos', 'finca'));
        }
        else{
            return redirect()->back()->with('error','No se encontro la finca');
        }
    }

    public function regristrarCultivo(Request $request)
    {
        $this->isSupervisor();

        $cultivo = new Cultivo();

        $cultivo->fechaestablecimiento = $request->fechaestablecimiento;
        $cultivo->analisissuelo = $request->analisissuelo;
        $cultivo->proveedorsemilla = $request->proveedorsemilla;
        $cultivo->sistemacultivo = $request->sistemacultivo;
        $cultivo->tipotrazado = $request->tipotrazado;
        $cultivo->edadtrazado = $request->edadtrazado;
        $cultivo->fechaarvanses = $request->fechaarvanses;
        $cultivo->nombrecontrolarvanses = $request->nombrecontrolarvanses;
        $cultivo->controlutilizadoarvanses = $request->controlutilizadoarvanses;
        $cultivo->fechaplagas = $request->fechaplagas;
        $cultivo->nombremanejoplagas = $request->nombremanejoplagas;
        $cultivo->controlutilizadoplagas = $request->controlutilizadoplagas;
        $cultivo->fechamanejoenfermedades = $request->fechamanejoenfermedades;
        $cultivo->nombremanejoenfermedades = $request->nombremanejoenfermedades;
        $cultivo->controlutilizadoenfermedades = $request->controlutilizadoenfermedades;
        $cultivo->finca_id = $request->idfinca;

        if($cultivo->save()){
            $imagen = $request->imagen;
            if (!Empty($imagen)) {

                $img = \Image::make($imagen);
                $path = public_path() . '/images/';

                $nombre = time() . '.' . $imagen->getClientOriginalExtension();
                $img->save($path . $nombre);

                $cultivo->imagen = 'images/' . $nombre;
                $cultivo->save();
            }

            return redirect()->back()->with('success','Se registro correctamente la información');
        }
        else{
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }
    }

    public function infoCultivo($id)
    {
        $this->isSupervisor();

        $cultivo = Cultivo::find($id);
        if($cultivo){
            return view('supervisorfinca.infocultivo', compact('cultivo'));
        }
        else{
            return redirect()->back()->with('error','No se encontro el cultivo');
        }
    }

    public function editCultivo($id)
    {
        $this->isSupervisor();

        $cultivo = Cultivo::find($id);
        if($cultivo){
            return view('supervisorfinca.editcultivo', compact('cultivo'));
        }
        else{
            return redirect()->back()->with('error','No se encontro el cultivo');
        }
    }

    public function actualizarCultivo(Request $request)
    {
        $this->isSupervisor();

        $cultivo = Cultivo::find($request->idcultivo);

        if(! $cultivo){
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }

        $cultivo->fechaestablecimiento = $request->fechaestablecimiento;
        $cultivo->analisissuelo = $request->analisissuelo;
        $cultivo->proveedorsemilla = $request->proveedorsemilla;
        $cultivo->sistemacultivo = $request->sistemacultivo;
        $cultivo->tipotrazado = $request->tipotrazado;
        $cultivo->edadtrazado = $request->edadtrazado;
        $cultivo->fechaarvanses = $request->fechaarvanses;
        $cultivo->nombrecontrolarvanses = $request->nombrecontrolarvanses;
        $cultivo->controlutilizadoarvanses = $request->controlutilizadoarvanses;
        $cultivo->fechaplagas = $request->fechaplagas;
        $cultivo->nombremanejoplagas = $request->nombremanejoplagas;
        $cultivo->controlutilizadoplagas = $request->controlutilizadoplagas;
        $cultivo->fechamanejoenfermedades = $request->fechamanejoenfermedades;
        $cultivo->nombremanejoenfermedades = $request->nombremanejoenfermedades;
        $cultivo->controlutilizadoenfermedades = $request->controlutilizadoenfermedades;

        if($cultivo->save()){
            $imagen = $request->imagen;
            if (!Empty($imagen)) {

                $img = \Image::make($imagen);
                $path = public_path() . '/images/';

                $nombre = time() . '.' . $imagen->getClientOriginalExtension();
                $img->save($path . $nombre);

                $cultivo->imagen = 'images/' . $nombre;
                $cultivo->save();
            }

            return redirect('cultivofinca/'.$cultivo->finca_id)->with('success','Se registro correctamente la información');
        }
        else{
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }
    }

    public function editPerfil()
    {
        $this->isSupervisor();

        $user = Auth::user();
        if($user){        
            return view('supervisorfinca.editperfil', compact('user'));
        }
        else{
            return redirect()->back()->with('error','No se encontro la información');
        }
    }

    public function guardarPerfil(Request $request)
    {
        $this->isSupervisor();

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
