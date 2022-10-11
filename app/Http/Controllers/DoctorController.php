<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Doctor;
use Carbon\Carbon;
use App\Models\Empresa;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    const PAGINACION= 1000;
    public function index(Request $request)
    {
    
        $doctores = Doctor::latest()->paginate($this::PAGINACION);
        //$pacientes = Paciente::latest()
        //->where('Nombre', 'LIKE', '%'.$buscapor.'%')
        //->where('created_at', 'LIKE', '%'.$f1.'%')
        //->where('created_at', 'LIKE', '%'.$fecha_fin.'%')
        /*->where('created_at', 'BETWEEN', $f1.'AND'.$fecha_fin)*/
        //->paginate($this::PAGINACION);
        
        return view('doctores.index')->with('doctores',$doctores);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctores.create');
    }
    public function reportePDF()
    {
        $doctores = Doctor::latest()->paginate(10);
        $pdf = Pdf::loadView('reporteDoctores', compact('doctores'));
        return $pdf->stream('REPORTE');
    }
    public function store(Request $request)
    {
        $siemprehoy = Carbon::now();
        $Doctores = new Doctor();
        $Doctores->sucursal = '01';
        $Doctores->doctor = '00001';
        $Doctores->Paterno = $request->get('Paterno');
        $Doctores->Materno = $request->get('Materno');
        $Doctores->Nombre = $request->get('Nombre');
        $Doctores->Direccion = $request->get('Direccion');
        $Doctores->Especialidad1 = $request->get('Especialidad1');
        $Doctores->Especialidad2 = $request->get('Especialidad2');
        $Doctores->Fec_alta = $siemprehoy;
        $Doctores->Pacientes_Mes = $request->get('Pacientes_Mes');
        $Doctores->Pacientes_Acum = $request->get('Pacientes_Acum');
        $Doctores->Importe_mes = $request->get('Importe_mes');
        $Doctores->Importe_Acum = $request->get('Importe_Acum');
        $Doctores->Centro = $request->get('Centro');
        $Doctores->Tels = $request->get('Tels');
        $Doctores->Estado = $request->get('Estado');
        $Doctores->Municipio = $request->get('Municipio');
        $Doctores->Localidad = $request->get('Localidad');
        $Doctores->cp = $request->get('cp');
        $Doctores->Colonia = $request->get('Colonia');
        $Doctores->fecha_act = $request->get('fecha_act');
        $Doctores->fecha_sync = $request->get('fecha_sync');
        $Doctores->flag_sucursales = $request->get('flag_sucursales');
        $Doctores->eliminar = 1;
        $Doctores->CedProf = $request->get('CedProf');
        $Doctores->FecNac = $request->get('FecNac');
        $Doctores->Sexo = $request->get('Sexo');
        $Doctores->email = $request->get('email');
        $Doctores->save();
        return redirect('/doctores');
        session()->flash('message', 'Doctor Successfully created.');
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
    public function edit(Request $request,$id)
    {
        
        $doctores = Doctor::all();
        $doctor = Doctor::find($id);
        return view('doctores.edit', compact('doctor', 'doctores'));
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
        $Doctor = Doctor::find($id);
        
        $Doctor->Paterno = $request->get('Paterno');
        $Doctor->Materno = $request->get('Materno');
        $Doctor->Nombre = $request->get('Nombre');
        $Doctor->Direccion = $request->get('Direccion');
        $Doctor->Especialidad1 = $request->get('Especialidad1');
        $Doctor->Especialidad2 = $request->get('Especialidad2');
        $Doctor->Fec_alta = $siemprehoy;
        $Doctor->Pacientes_Mes = $request->get('Pacientes_Mes');
        $Doctor->Pacientes_Acum = $request->get('Pacientes_Acum');
        $Doctor->Importe_mes = $request->get('Importe_mes');
        $Doctor->Importe_Acum = $request->get('Importe_Acum');
        $Doctor->Centro = $request->get('Centro');
        $Doctor->Tels = $request->get('Tels');
        $Doctor->Estado = $request->get('Estado');
        $Doctor->Municipio = $request->get('Municipio');
        $Doctor->Localidad = $request->get('Localidad');
        $Doctor->cp = $request->get('cp');
        $Doctor->Colonia = $request->get('Colonia');
        $Doctor->fecha_act = $request->get('fecha_act');
        $Doctor->fecha_sync = $request->get('fecha_sync');
        $Doctor->flag_sucursales = $request->get('flag_sucursales');
        $Doctor->eliminar = 1;
        $Doctor->CedProf = $request->get('CedProf');
        $Doctor->FecNac = $request->get('FecNac');
        $Doctor->Sexo = $request->get('Sexo');
        $Doctor->email = $request->get('email');
        $Doctor->save();
        return redirect('/doctores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();
        return redirect('/doctores')->with('eliminar', 'Echo');
    }
}
