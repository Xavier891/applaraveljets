<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\Paciente;
use Carbon\Carbon;
use App\Models\Empresa;

class ImprimirController extends Controller
{
    public function imprimir(){
        //$pdf = \PDF::loadView('ejemplo');
        //return $pdf->download('ejemplo.pdf');
   }
}
