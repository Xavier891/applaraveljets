@extends('adminlte::page')

@section('title', 'Registro')

@section('content_header')
<h1>Añadir registros</h1>
@stop

@section('content')
<div data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
<div class="container-fluid" style="width:40%;">
    <div class="modal-body">
        <div id="CreaContainer">
               <form  class="frmestudios" id="createestudios" action="/estudios" method="POST">
                @csrf
                   <div id="frm-estudios" class="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="#Primero" data-toggle="tab" role="tab" aria-selected="false">Datos Personales</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="#Opcional" data-toggle="tab" role="tab" aria-selected="false">Datos de facturación (Opcional)</a>
                            </li>
                       </ul>
        
                       <div class="tab-content">
                           <div role="tabpanel" class="tab-pane active" id="Primero">
                               <div class="card">
            
                                   <div class="card-body">
                                        
                                       
                                        <!--------------------Nombre------------------->
                                        <div class="form-group">
                                           <label class="control-label">Nombre del estudio:</label><b class="obligatorio">(*)</b>
                                           <input autocomplete="off" onkeypress="return soloLetras(event)" required class="form-control text-box single-line" id="Nombre" minlength="2" maxlength="50" name="Nombre" type="text" tabindex="4">@error('Nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <!--------------------Abreviatura------------------->
                                        <div class="form-group">
                                           <label class="control-label">Abreviatura:</label><b class="obligatorio">(*)</b>
                                           <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line" id="Abreviatura" minlength="2" maxlength="50" name="Abreviatura" type="text" required tabindex="5">@error('Abreviatura') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <!--------------------DatosTecnicos------------------->
                                        <div class="form-group">
                                           <label class="control-label">Datos Tecnicos:</label>
                                           <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line" id="DatosTecnicos" minlength="2" maxlength="50" name="DatosTecnicos" type="text" required tabindex="6">
                                           <p class="warnings" id="warning_Materno"></p>
                                       </div>
                                      
                                        <!------------------Departamento--------------------->
                                        <div class="form-group">
                                           <label class="control-label" for="EmpresaPaciente">Departamento:</label><b class="obligatorio">(*)</b>
                                           <select class="form-control select2-hidden-accessible" required id="Depto" name="Depto" tabindex="-1" aria-hidden="true">
                                               <option value="333">Elegir...</option>
                                               @foreach($deptos as $depto)
                                               <option value="{{$depto->id}}">{{$depto->Depto}}</option>
                                               @endforeach
                                           </select><span class="select2 select2-container select2-container--classic" dir="ltr" data-select2-id="20" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-EmpresaPaciente-container"><span class="select2-selection__rendered" id="select2-EmpresaPaciente-container" role="textbox" aria-readonly="true" title="PÚBLICO EN GENERAL"><span class="select2-selection__clear" title="Remove all items" data-select2-id="22">×</span>PÚBLICO EN GENERAL</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>@error('Nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>                                                               
                               </div>
                            </div>
                            <!----------------------------------------Datos de Facturación (Opcional)----------------------------------------------------------->
                            <div role="tabpanel" class="tab-pane" id="Opcional" >
                                <div class="card">
                                    <div class="card-body">
                                       <div class="form-group">                           
                                           <label class="control-label" for="Rfc">RFC:</label>                                                        
                                           <input autofocus class="form-control text-box single-line" id="Rfc" minlength="13" maxlength="13" name="Rfc" type="text">                          
                                       </div>
                                       
                                    </div>
                               </div>
                            </div>
                            <!----------------------------------------------Fin del Opcional------------------------------------------------------->
                            <div style="text-align:right">
                               <a href="/estudios"> <button class="btn btn-secondary" type="button">Cancelar</button></a>
                               <button type="submit" class="btn btn-primary close-modal" >Guardar</button>         
                           </div>
                        </div>
                   </div>
               </form>
       </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script>
        $(function(){
    
            $('.validanumericos').keypress(function(e) {
                if(isNaN(this.value + String.fromCharCode(e.charCode))) 
                return false;
            })
            .on("cut copy paste",function(e){
                e.preventDefault();
            });   
        });
    </script>
    <script>
            
            function soloLetras(e) {
              var key = e.keyCode || e.which,
                tecla = String.fromCharCode(key).toLowerCase(),
                letras = " áéíóúabcdefghijklmnñopqrstuvwxyz",
                especiales = [8, 37, 39, 46],
                tecla_especial = false;
          
              for (var i in especiales) {
                if (key == especiales[i]) {
                  tecla_especial = true;
                  break;
                }
              }
          
              if (letras.indexOf(tecla) == -1 && !tecla_especial) {
                return false;
              }
              
            }
            
    </script>
@stop