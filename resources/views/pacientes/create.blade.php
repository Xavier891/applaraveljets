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
               <form  class="frmPacientes" id="createPacientes" action="/pacientes" method="POST">
                @csrf
                   <div id="frm-pacientes" class="tabpanel">
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
                                        <div class="row">
                                            <div class="col-6" style="text-align:right">
                                               <label class="control-label" for="sucursal">Sucursal: <strong> 00-MATRIZ</strong></label>
                                            </div>
                                            <!--------------------sucursal------------------->
                                            <div class="col-6" style="text-align:left" hidden>
                                                <input required value="11" id="sucursal" name="sucursal" type="text" class="form-control" tabindex="1">
                                            </div>                            
                                        </div>
                                        
                                       <!----------------------Paciente---------------->
                                       <div class="form-group" hidden>
                                          <label for="Paciente"></label>
                                          <input required value="111" class="form-control" id="Paciente" name="Paciente" tabindex="3">
                                        </div>
                                        <!--------------------Nombre------------------->
                                        <div class="form-group">
                                           <label class="control-label">Nombre:</label><b class="obligatorio">(*)</b>
                                           <input autocomplete="off" onkeypress="return soloLetras(event)" required class="form-control text-box single-line" id="Nombre" minlength="2" maxlength="50" name="Nombre" type="text" required tabindex="4">@error('Nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <!--------------------Paterno------------------->
                                        <div class="form-group">
                                           <label class="control-label">Apellido Paterno:</label><b class="obligatorio">(*)</b>
                                           <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line" id="Paterno" minlength="2" maxlength="50" name="Paterno" type="text" required tabindex="5">@error('Paterno') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <!--------------------Materno------------------->
                                        <div class="form-group">
                                           <label class="control-label">Apellido Materno:</label>
                                           <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line" id="Materno" minlength="2" maxlength="50" name="Materno" type="text" required tabindex="6">
                                           <p class="warnings" id="warning_Materno"></p>
                                       </div>
                                       <!--------------------Fecha------------------->
                                       <div class="form-group">
                                          <label class="control-label" for="FecNac">Fecha de nacimiento:</label>
                                          <input required  class="form-control text-box single-line" id="FecNac" maxlength="10" name="FecNac" type="date" tabindex="">@error('FecNac') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        
                                        <!------------------Sexo--------------------->
                                        <div class="form-group">
                                            <label class="control-label" for="Sexo">Género:</label><b class="obligatorio">(*)</b>
                                            <div class="form-check">
                                               <input required class="form-check-input" id="Sexo" name="Sexo" type="radio" value="H"><label class="form-check-label">H</label> @error('Sexo') <span class="error text-danger">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" id="Sexo" name="Sexo" type="radio" value="M" required><label class="form-check-label">M</label>@error('Sexo') <span class="error text-danger">{{ $message }}</span> @enderror
                                            </div>
                                        </div>
                                        <!------------------Empresa--------------------->
                                        <div class="form-group">
                                           <label class="control-label" for="EmpresaPaciente">Empresa:</label><b class="obligatorio">(*)</b>
                                           <select class="form-control select2-hidden-accessible" required id="Empresa" name="Empresa" tabindex="-1" aria-hidden="true">
                                               <option value="333">Elegir...</option>
                                               @foreach($empresas as $empresa)
                                               <option value="{{$empresa->id}}">{{$empresa->Nombre}}</option>
                                               @endforeach
                                           </select><span class="select2 select2-container select2-container--classic" dir="ltr" data-select2-id="20" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-EmpresaPaciente-container"><span class="select2-selection__rendered" id="select2-EmpresaPaciente-container" role="textbox" aria-readonly="true" title="PÚBLICO EN GENERAL"><span class="select2-selection__clear" title="Remove all items" data-select2-id="22">×</span>PÚBLICO EN GENERAL</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>@error('Nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="form-group">
                                           <label class="control-label" for="Telefono">Teléfono:</label><br>
                                           <input autocomplete="off" class="form-control text-box single-line validanumericos" id="Telefono" minlength="10" maxlength="10" name="Telefono" type="text" >
                                        </div>
                                       <div class="form-group">
                                           <label class="control-label" for="email">Email:</label>
                                           <input class="form-control text-box single-line" id="email" maxlength="70" name="email" type="email" >
                    
                                        </div>
                                        <!--------------------eliminar------------------->
									    <div class="form-group" hidden>
										   <label class="control-label">eliminar:</label>
										   <input  class="form-control text-box single-line" value="1" id="eliminar" maxlength="50" name="eliminar" type="text" tabindex="6">
									    </div>
                                        <div class="form-group">
                                           <input required data-val="true" id="enviarwhatsapp" name="enviarwhatsapp" type="checkbox" value="44"><input required name="enviarwhatsapp" type="hidden" value="44">
                                           <label class="form-check-label" for="Enviar_por_Whatsapp">Enviar por Whatsapp</label>
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
                                       <div class="form-group">                           
                                           <label class="control-label" for="Calle">Calle:</label>
                                           <input  class="form-control text-box single-line" id="Calle" minlength="2" maxlength="50" name="Calle" type="text" >                            
                                       </div>
                                       <div class="form-group">                           
                                           <label class="control-label" for="Numero">Número:</label>
                                           <input class="form-control text-box single-line" id="Numero" minlength="1" maxlength="10" name="Numero" type="text" >                            
                                       </div>
                                       <div class="form-group">                           
                                            <label class="control-label" for="Colonia">Colonia:</label>                            
                                            <input class="form-control text-box single-line" id="Colonia" minlength="2" maxlength="25" name="Colonia" type="text" >                            
                                        </div>
                                       <div class="form-group">                           
                                           <label class="control-label" for="Cp">Código Postal:</label>
                                          <input autocomplete="off" class="form-control text-box single-line validanumericos" id="Cp" minlength="5" maxlength="5" name="Cp" type="text" >                            
                                       </div>
                                       <div class="form-group">                           
                                          <label class="control-label" for="Municipio">Municipio:</label>
                                          <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line" minlength="2" maxlength="25" id="Municipio" name="Municipio" type="text" >                            
                                       </div>
                                       <div class="form-group">                           
                                           <label class="control-label" for="Estado">Estado:</label>
                                           <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line" id="Estado" minlength="2" maxlength="25" name="Estado" type="text" >          
                                       </div>
                                       <div class="form-group">                           
                                           <label class="control-label" for="Pais">País:</label>
                                           <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line" id="Pais" minlength="2" maxlength="25" name="Pais" type="text" >                            
                                       </div>
                                    </div>
                               </div>
                            </div>
                            <!----------------------------------------------Fin del Opcional------------------------------------------------------->
                            <div style="text-align:right">
                               <a href="/pacientes"> <button class="btn btn-secondary" type="button">Cancelar</button></a>
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