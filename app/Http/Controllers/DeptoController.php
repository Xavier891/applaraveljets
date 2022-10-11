<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Depto;
use Exception;

class DeptoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    const PAGINACION= 1000;
    public function index()
    {
        $deptos = Depto::latest()->paginate(1000);

        return view('deptos.index')->with('deptos', $deptos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('deptos.create');
    }

    public function reportePDF()
    {
        $siemprehoy = Carbon::now()->toDateString();
        $actualhora = Carbon::now()->isoFormat('H:mm:ss A');
        $deptos = Depto::latest()->paginate(10);
        $pdf = Pdf::loadView('reporteDeptos', compact('deptos', 'siemprehoy', 'actualhora'))
        ->setPaper(array(0,0,1000.00,1000), 'portrait');
        return $pdf->stream('REPORTE');
    }

    public function store(Request $request)
    {
        try{
            $siemprehoy = Carbon::now();
            $Deptos = new Depto();
            $Deptos->Depto = $request->get('Depto');
            $Deptos->fecha_act = $siemprehoy;
            $Deptos->eliminar = 1;
            
            $Deptos->save();
            return redirect('/deptos')->with('duplicado', 'Echo');
            
        }
       catch(Exception $e){
           return back()->with('error', 'Empresa registrada. Dato duplicadpo'. $e->getMessage());
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
        $depto = Depto::find($id);
        return view('deptos.edit', compact('depto'));
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
        $Depto = Depto::find($id);
        $Depto->Depto = $request->get('Depto');
        $Depto->save();
        return redirect('/deptos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $depto = Depto::find($id);
        $depto->delete();
        return redirect('/deptos')->with('eliminar', 'Echo');
    }
}
