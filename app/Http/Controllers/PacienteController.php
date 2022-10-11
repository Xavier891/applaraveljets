<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Carbon\Carbon;
use App\Models\Paciente;
use App\Models\Empresa;

//SELECT * FROM pacientes WHERE created_at BETWEEN '$f1' AND '$f2'  "
class PacienteController extends Controller
{
    const PAGINACION= 1000;
    public function index(Request $request)
    {
        //$f1 = $request->get('f1');
        //$fecha_fin = $request->get('fecha_fin');
        //$buscapor = $request->get('buscapor');

        $empresas = Empresa::all();
        $pacientes = Paciente::latest()->paginate($this::PAGINACION);
        //$pacientes = Paciente::latest()
        //->where('Nombre', 'LIKE', '%'.$buscapor.'%')
        //->where('created_at', 'LIKE', '%'.$f1.'%')
        //->where('created_at', 'LIKE', '%'.$fecha_fin.'%')
        /*->where('created_at', 'BETWEEN', $f1.'AND'.$fecha_fin)*/
        //->paginate($this::PAGINACION);
        
        return view('pacientes.index')->with('pacientes',$pacientes);
        //->with('pacientesI',$pacientesI);
    }

     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $empresas = Empresa::all();
        return view('pacientes.create', compact('empresas'));
    }
    public function reportePDF()
    {

        $siemprehoy = Carbon::now()->toDateString();
        $actualhora = Carbon::now()->isoFormat('H:mm:ss A');
        $pacientes = Paciente::latest()->paginate(7);
        $pdf = Pdf::loadView('reportepacientes', 
        compact('pacientes','actualhora','siemprehoy'))->setPaper(array(200,10,800.00,1300), 'landscape');
        return $pdf->stream('REPORTE');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siemprehoy = Carbon::now();
        $Pacientes = new Paciente();
        $Pacientes->sucursal = '01';
        $Pacientes->Paciente = '000001';
        $Pacientes->Paterno = $request->get('Paterno');
        $Pacientes->Materno = $request->get('Materno');
        $Pacientes->Nombre = $request->get('Nombre');
        $Pacientes->FecNac = $request->get('FecNac');
        $Pacientes->Sexo = $request->get('Sexo');
        $Pacientes->Calle = $request->get('Calle');
        $Pacientes->Numero = $request->get('Numero');
        $Pacientes->Rfc = $request->get('Rfc');
        $Pacientes->Estudios = $request->get('Estudios');
        $Pacientes->Ult_solicitud = $request->get('Ult_solicitud');
        $Pacientes->Fec_alta = $siemprehoy;
        $Pacientes->Importe = $request->get('Importe');
        $Pacientes->Importe_Acum = $request->get('Importe_Acum');
        $Pacientes->Saldo = $request->get('Saldo');
        $Pacientes->EmpresaAnt = $request->get('EmpresaAnt');
        $Pacientes->suc_empresa = '01';
        $Pacientes->Empresa = $request->get('Empresa');
        $Pacientes->Foraneo = $request->get('Foraneo');
        $Pacientes->Descuento = $request->get('Descuento');
        $Pacientes->Titular = $request->get('Titular');
        $Pacientes->Estado = $request->get('Estado');
        $Pacientes->Municipio = $request->get('Municipio');
        $Pacientes->Localidad = $request->get('Localidad');
        $Pacientes->Cp = $request->get('Cp');
        $Pacientes->Colonia = $request->get('Colonia');
        $Pacientes->Credencial = $request->get('Credencial');
        $Pacientes->NumCredencial = $request->get('NumCredencial');
        $Pacientes->Telefono = $request->get('Telefono');
        $Pacientes->NumEmpleado = $request->get('NumEmpleado');
        $Pacientes->Pais = $request->get('Pais');
        $Pacientes->cliente = $request->get('cliente');
        $Pacientes->email = $request->get('email');
        $Pacientes->fecha_act = $request->get('fecha_act');
        $Pacientes->fecha_sync = $request->get('fecha_sync');
        $Pacientes->flag_sucursales = $request->get('flag_sucursales');
        $Pacientes->eliminar = $request->get('eliminar');
        $Pacientes->enviarwhatsapp = $request->get('enviarwhatsapp');


        $Pacientes->save();
        return redirect('/pacientes');
        session()->flash('message', 'Paciente Successfully created.');
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
        return view('pacientes.edit')->with([
            'paciente' => Paciente::find($id),
            'empresas' => Empresa::all()
        ]);
        //$empresas = Empresa::all();
        //$paciente = Paciente::find($id);
        //return view('pacientes.edit', compact('paciente'))->with('empresas',$empresas);//->with('paciente',$paciente)
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
        $siemprehoy = Carbon::now();

        $Paciente = Paciente::find($id);
        //$Paciente->sucursal = '01';
        //$Paciente->Clave = '000001';
        //$Paciente->Paciente = '000001';
        $Paciente->Paterno = $request->get('Paterno');
        $Paciente->Materno = $request->get('Materno');
        $Paciente->Nombre = $request->get('Nombre');
        $Paciente->FecNac = $request->get('FecNac');
        $Paciente->Sexo = $request->get('Sexo');
        $Paciente->Calle = $request->get('Calle');
        $Paciente->Numero = $request->get('Numero');
        $Paciente->Rfc = $request->get('Rfc');
        $Paciente->Estudios = $request->get('Estudios');
        $Paciente->Ult_solicitud = $request->get('Ult_solicitud');
        $Paciente->Fec_alta = $request->get('Fec_alta');
        $Paciente->Importe = $request->get('Importe');
        $Paciente->Importe_Acum = $request->get('Importe_Acum');
        $Paciente->Saldo = $request->get('Saldo');
        $Paciente->EmpresaAnt = $request->get('EmpresaAnt');
        $Paciente->suc_empresa = '01';
        $Paciente->Empresa = $request->get('Empresa');
        $Paciente->Foraneo = $request->get('Foraneo');
        $Paciente->Descuento = $request->get('Descuento');
        $Paciente->Titular = $request->get('Titular');
        $Paciente->Estado = $request->get('Estado');
        $Paciente->Municipio = $request->get('Municipio');
        $Paciente->Localidad = $request->get('Localidad');
        $Paciente->Cp = $request->get('Cp');
        $Paciente->Colonia = $request->get('Colonia');
        $Paciente->Credencial = $request->get('Credencial');
        $Paciente->NumCredencial = $request->get('NumCredencial');
        $Paciente->Telefono = $request->get('Telefono');
        $Paciente->NumEmpleado = $request->get('NumEmpleado');
        $Paciente->Pais = $request->get('Pais');
        $Paciente->cliente = $request->get('cliente');
        $Paciente->email = $request->get('email');
        $Paciente->fecha_act = $request->get('fecha_act');
        $Paciente->fecha_sync = $request->get('fecha_sync');
        $Paciente->flag_sucursales = $request->get('flag_sucursales');
        $Paciente->enviarwhatsapp = $request->get('enviarwhatsapp');
        $Paciente->save();
        return redirect('/pacientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $Paciente = Paciente::find($id);
        $Paciente->delete();
        return redirect('/pacientes')->with('eliminar', 'Echo');
    }
}
