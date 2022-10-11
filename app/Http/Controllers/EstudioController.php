<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Depto;
use App\Models\Estudio;

class EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudios = Estudio::latest()->paginate(1000);
        return view ('estudios.index')->with('estudios', $estudios);
    }

    public function reportePDF()
    {
        $siemprehoy = Carbon::now()->toDateString();
        $actualhora = Carbon::now()->isoFormat('H:mm:ss A');
        $estudios = Estudio::latest()->paginate(8);
        $pdf = Pdf::loadView('reportEstudios', compact('estudios', 'siemprehoy', 'actualhora'))
        ->setPaper(array(200,10,800.00,1300), 'landscape');
        return $pdf->stream('REPORTE');
    }

    public function create()
    {
        $deptos = Depto::all();
        return view ('estudios.create', compact('deptos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Estudios = new Estudio();
        $Estudios->sucursal  = '11';
        $Estudios->depto  = $request->get('Depto');
        $Estudios->Nombre = $request->get('Nombre');
        $Estudios->Abreviatura	 = $request->get('Abreviatura');
        $Estudios->DatosTecnicos = $request->get('DatosTecnicos');
        $Estudios->esperfil = 1;
        $Estudios->eliminar = 1;
        $Estudios->SucProceso = '01';
        $Estudios->save();
        return redirect('/estudios');
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
        return view('estudios.edit')->with([
            'estudio' => Estudio::find($id),
            'deptos' => Depto::all()
        ]);
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
        $Estudio = Estudio::find($id);
        $Estudio->Nombre = $request->get('Nombre');
        $Estudio->Abreviatura = $request->get('Abreviatura');
        $Estudio->DatosTecnicos = $request->get('DatosTecnicos');
        $Estudio->depto = $request->get('Departamento');
        $Estudio->save();
        return redirect('/estudios');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudio = Estudio::find($id);
        $estudio->delete();
        return redirect('/estudios')->with('eliminar', 'Echo');
    }
}
