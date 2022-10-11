<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                            <strong>RFC: 000000000</strong>
                            <p>Dirección Tel: 999999/Cel.999999</p>
                            <strong>Suc. Matriz Municipio, Estado, País</strong>                            
                        </div>
                       
                    </div>
                    
                </div>
                
            </div>
            <br>
            <br>
            <br>
            <div class="row">
                
                <table id="deptos" class="table table-striped" style="width: 100%">
                    <p class="float-left d-none d-sm-block">Fecha: {{$siemprehoy}}      </p>
                    <p align="right">Hora: {{$actualhora}}</p>
                    <thead class="thead">
                        <tr>                                 
                            <th scope="col">Clave</th>
                            <th scope="col">Nombre</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($deptos as $depto)
                       
                        <tr>
                            
                            <td>{{ $depto->Clave }}</td>
                            <td>{{ $depto->Depto }} </td>
                        </tr>
                        @endforeach
                    </tbody>
                
                </table>
            </div>
            {{-- <div class="col-md-8">
                <center><h2>Reporte</h2></center>
            </div> --}}
           
           
                
                    
        </div>
        <br>
        <br>
        <br>
        <footer>
           
           <br>
           <center>
            <div >
                Versión a.0.0.0.20210310
            </div>
            <strong>©2022 <a href="https://www.inadware.com.mx/">Inadware de México, S. de R.L.</a></strong></center>
        </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>