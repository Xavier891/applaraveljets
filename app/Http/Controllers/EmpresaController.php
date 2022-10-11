<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Empresa;
use Exception;
use Carbon\Carbon;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::latest()->paginate(1000);
        return view ('empresas.index')->with('empresas', $empresas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empresas.create');
    }

    public function reportePDF()
    {
        $siemprehoy = Carbon::now()->toDateString();
        $actualhora = Carbon::now()->isoFormat('H:mm:ss A');
        $empresas = Empresa::latest()->paginate(10);
        $pdf = Pdf::loadView('reporteEmpresas', compact('empresas', 'siemprehoy', 'actualhora'))
        ->setPaper(array(200,10,800.00,1300), 'landscape');
        return $pdf->stream('REPORTE');
    }

    public function store(Request $request)
    {
        $Empresas = new Empresa();
        $Empresas->sucursal = '01';
        $Empresas->Nombre = $request->get('Nombre');
        $Empresas->tel1 = $request->get('tel1');
        $Empresas->tel2 = $request->get('tel2');
        $Empresas->cp = $request->get('cp');
        $Empresas->eliminar = 1;
        $Empresas->save();
        return redirect('/empresas');
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
        $empresa = Empresa::find($id);
        return view('empresas.edit', compact('empresa'));
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
        $Empresa = Empresa::find($id);
        
        $Empresa->Nombre = $request->get('Nombre');
        $Empresa->tel1 = $request->get('tel1');
        $Empresa->tel2 = $request->get('tel2');
        $Empresa->cp = $request->get('cp');
        $Empresa->save();
        return redirect('/empresas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $empresa = Empresa::find($id);
            $empresa->delete();
            return redirect('/empresas')->with('eliminar', 'Echo');
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }
}
