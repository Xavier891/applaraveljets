<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title> Reporte </title>
    </head>

    <body>
        <style>
            *{
                margin: 0 auto;
            }
            
        </style>
        <div class="container mt-4">
            <div class="row">
                <div class="invoice-flex-contents">
                    <div class="invoice-logo">
                        <img src="{{ public_path('img/Logoinadware0001.png') }}" alt="" style="width: 35%;">
                        <div class="invoice-flex-contents float-right d-none d-sm-block">
                            <h5>LABORATORIO DE ANÁLISIS CLÍNICOS</h5>
                            <strong>Suc. Matriz</strong>
                            <p>Dirección Tel: 999999/Cel.999999</p>
                            <p>Municipio, Estado, País</p>
                        </div>
                    </div>
                    
                </div>
                
                <br>
                <br>
                
                
            </div>
            {{-- <div class="col-md-8">
                <center><h2>Reporte</h2></center>
            </div> --}}
            <div class="col-md-12">
                <p class="float-left d-none d-sm-block">Fecha: {{$siemprehoy}}</p>
                
            </div>
            <div class="col-md-12">
                <p class="float-right d-none d-sm-block">Hora: {{$actualhora}}</p>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <table id="pacientes" class="table table-striped">
                        <thead class="thead">
                            <tr> 
                                
                                <th scope="col">Clave</th>
                                <th scope="col">Fec. Alta</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">A.Paterno</th>
                                <th scope="col">A.Materno</th>
                                <th scope="col">Fecha de Nacimiento</th>
                                <th scope="col">Sexo</th>
                                <th scope="col">Domicilio</th>
                                <th scope="col">C.P</th>
                                <th scope="col">Estado</th>
                                <th scope="col">Municipio</th>
                                <th scope="col">Teléfono</th>
                                <th scope="col">E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @foreach($pacientes as $paciente)
                           
                            <tr>
                                
                                <td>{{ $paciente->Clave }}</td>
                                <td>{{ $paciente->Fec_alta }} </td>
                                <td>{{ $paciente->Nombre }} </td>
                                <td>{{ $paciente->Paterno }} </td>
                                <td>{{ $paciente->Materno }}</td>
                                <td>{{ $paciente->FecNac }}</td>
                                <td>{{ $paciente->Sexo }} </td>
                                <td>{{$paciente->Calle}} {{$paciente->Numero}} {{ $paciente->Colonia }}</td>
                                <td>{{$paciente->Cp}}</td>
                                <td>{{$paciente->Estado}}</td>
                                <td>{{$paciente->Municipio}}</td>
                                <td>{{$paciente->Telefono}}</td>
                                <td>{{$paciente->email}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                </div>
            </div>
        </div>
        <br>
        <br>
        <br>
        <footer>
           
           <br>
           <center>
            <div class="float-right d-none d-sm-block">
                Versión a.0.0.0.20210310
            </div>
            <strong>©2022 <a href="https://www.inadware.com.mx/">Inadware de México, S. de R.L.</a></strong></center>
        </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>