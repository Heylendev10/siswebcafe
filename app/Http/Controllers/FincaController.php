<?php

namespace App\Http\Controllers;

use App\Cosecha;
use App\Exports\ExcelExport;
use App\Finca;
use App\User;
use App\UsuarioFinca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class FincaController extends Controller
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

    public function fincas()
    {
        $this->isAdmin();

        $fincas = Finca::get();

        return view('fincas.index', compact('fincas'));
    }

    public function regristrarFinca(Request $request)
    {
        $this->isAdmin();

        $existe = Finca::where('nombre',$request->nombre)->first();
        if($existe){
            return redirect()->back()->with('error','El nombre de la finca ya se encuentra registrado')->withInput();
        }
        $finca = new Finca();

        $finca->nombre = $request->nombre;
        $finca->municipio = $request->municipio;
        $finca->departamento = $request->departamento;
        $finca->direccion = $request->direccion;
        $finca->area = $request->area;
        $finca->vereda = $request->vereda;
        $finca->codigosica = $request->codigosica;

        if($finca->save()){
            $imagen = $request->imagen;
            if (!Empty($imagen)) {

                $img = \Image::make($imagen);
                $path = public_path() . '/images/';

                $nombre = time() . '.' . $imagen->getClientOriginalExtension();
                $img->save($path . $nombre);

                $finca->imagen = 'images/' . $nombre;
                $finca->save();
            }

            return redirect()->back()->with('success','Se registro correctamente la información');
        }
        else{
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }
    }

    public function verFinca($id)
    {
        $this->isAdmin();

        $finca = Finca::find($id);
        if($finca){
            return view('fincas.verfinca', compact('finca'));
        }
        else{
            return redirect()->back()->with('error','No se encontro la finca');
        }
    }

    public function editFinca($id)
    {
        $this->isAdmin();

        $finca = Finca::find($id);
        if($finca){
            return view('fincas.editfinca', compact('finca'));
        }
        else{
            return redirect()->back()->with('error','No se encontro el usuario');
        }
    }

    public function actualizarFinca(Request $request)
    {
        $this->isAdmin();

        $existe = Finca::where('nombre',$request->nombre)->where('id','!=',$request->idfinca)->first();
        if($existe){
            return redirect()->back()->with('error','El nombre de la finca ya se encuentra registrado')->withInput();
        }
        $finca = Finca::find($request->idfinca);

        if($finca){
	        $finca->nombre = $request->nombre;
	        $finca->municipio = $request->municipio;
	        $finca->departamento = $request->departamento;
	        $finca->direccion = $request->direccion;
	        $finca->area = $request->area;
	        $finca->vereda = $request->vereda;
	        $finca->codigosica = $request->codigosica;

            if($finca->save()){
                $imagen = $request->imagen;
                if (!Empty($imagen)) {

                    $img = \Image::make($imagen);
                    $path = public_path() . '/images/';

                    $nombre = time() . '.' . $imagen->getClientOriginalExtension();
                    $img->save($path . $nombre);

                    $finca->imagen = 'images/' . $nombre;
                    $finca->save();
                }

                return redirect('fincas')->with('success','Se registro correctamente la información');
            }
            else{
                return redirect()->back()->with('error','No se pudo actualizar la información')->withInput();
            } 
        }
        else{
                return redirect()->back()->with('error','No se encontro la finca')->withInput();
            } 
    }

    public function asociarSuper($id)
    {
        $this->isAdmin();

        $finca = Finca::find($id);

        if ($finca) {
            $supervisores = UsuarioFinca::select('users.nombre', 'users.apellido', 'users.documento', 'usuario_finca.fechainicio', 'usuario_finca.fechafin', 'usuario_finca.id')
                                        ->join('users', 'users.id', '=', 'usuario_finca.user_id')
                                        ->where('usuario_finca.finca_id', $id)->get();

            $allsuper = User::where('rol', 'Supervisor')->get();
            return view('fincas.supersfinca', compact('supervisores', 'allsuper', 'finca'));
        }
        else{
                return redirect()->back()->with('error','No se encontro la finca')->withInput();
            } 

        
    }

    public function regristrarSuperFinca(Request $request)
    {
        $this->isAdmin();

        $super = new UsuarioFinca();

        $super->finca_id = $request->idfinca;
        $super->user_id = $request->supervisor;
        $super->fechainicio = $request->fechainicio;

        if($super->save()){
            return redirect()->back()->with('success','Se registro correctamente la información');
        }
        else{
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }
    }

    public function regristrarFechaFinSuperFinca(Request $request)
    {
        $this->isAdmin();

        $super = UsuarioFinca::find($request->idsuperfinca);
        if($super){
            $super->fechafin = $request->fechafin;

            if($super->save()){
                return redirect()->back()->with('success','Se registro correctamente la información');
            }
            else{
                return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
            }
        }
        else{
            return redirect()->back()->with('error','No se pudo registrar la información')->withInput();
        }

    }

    public function exportCosecha($id_finca)
    {

        $finca = Finca::find($id_finca);

        if(is_null($finca)){
            return redirect()->back()->with('error','No se pudo encontrar la finca');
        }

        $cosechas = Cosecha::select('cosecha.aspecto', 'cosecha.color', 'cosecha.porcefrutomaduro', 'cosecha.porcefrutodañadobroca',
            'cosecha.fecha', 'cosecha.tiposrecoleccion', 'cosecha.condicionesclimaticas', 'cosecha.nombreresponsable', 'finca.nombre as nombrefinca')
            ->join('finca', 'finca.id', '=', 'cosecha.finca_id')
            ->where('finca_id', $id_finca)
            ->orderBy('fecha', 'desc')
            ->get();

        $encabezado = [
            'ASPECTO', 'COLOR', '% FRUTO MADURO', '% FRUTO DAÑADO BROCA','FECHA','TIPO RECOLECCION','CONDICIONES CLIMATICAS',
            'NOMBRE RESPONSABLE', 'FINCA'
        ];

        return Excel::download(new ExcelExport($cosechas, $encabezado, 'Informe_Cosecha'), 'Informe_Cosechas.xlsx');
    }

    public function cosechaFinca($id)
    {
        $this->isAdmin();

        $finca = Finca::find($id);
        if($finca){
            $cosechas = Cosecha::where('finca_id', $finca->id)->get();
            return view('fincas.cosecha', compact('cosechas', 'finca'));
        }
        else{
            return redirect()->back()->with('error','No se encontro la finca');
        }
    }

    public function exportIndividualCosecha($id_cosecha)
    {

        $cosecha = Cosecha::find($id_cosecha);

        if(is_null($cosecha)){
            return redirect()->back()->with('error','No se pudo encontrar la cosecha');
        }

        $cosechas = Cosecha::select('cosecha.aspecto', 'cosecha.color', 'cosecha.porcefrutomaduro', 'cosecha.porcefrutodañadobroca',
            'cosecha.fecha', 'cosecha.tiposrecoleccion', 'cosecha.condicionesclimaticas', 'cosecha.nombreresponsable', 'finca.nombre as nombrefinca')
            ->join('finca', 'finca.id', '=', 'cosecha.finca_id')
            ->where('cosecha.id', $cosecha->id)
            ->get();

        $encabezado = [
            'ASPECTO', 'COLOR', '% FRUTO MADURO', '% FRUTO DAÑADO BROCA','FECHA','TIPO RECOLECCION','CONDICIONES CLIMATICAS',
            'NOMBRE RESPONSABLE', 'FINCA'
        ];

        return Excel::download(new ExcelExport($cosechas, $encabezado, 'Informe_Cosecha'), 'Informe_Cosecha.xlsx');
    }

    public function estadisticaCosecha(Request $request)
    {

        $cosecha = Cosecha::find($request->id);

        if(is_null($cosecha)){
            return redirect()->back()->with('error','No se pudo encontrar la cosecha');
        }

        return response()->json([
            'fmaduro' => (int) $cosecha->porcefrutomaduro,
            'fdbroca' => (int) $cosecha->porcefrutodañadobroca
        ]);


    }

}
