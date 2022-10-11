@extends('adminlte::page')

@section('title', 'Registro')

@section('content_header')
<h1>Añadir registros</h1>
@stop

@section('content')
<div class="container-fluid" style="width:40%;">
    <div class="modal-content">
        <div class="modal-body">
            <div id="CreaContainer">
               <form  class="frmDoctores" id="createDoctores" action="/doctores" method="POST">
                @csrf
                   <div id="frm-pacientes" class="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="#Primero" data-toggle="tab" role="tab" aria-selected="false">Datos Personales</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" href="#Opcional" data-toggle="tab" role="tab" aria-selected="false">Datos de Nómina (Opcional)</a>
                            </li>
                       </ul>
        
                       <div class="tab-content">
                           <div role="tabpanel" class="tab-pane active" id="Primero">
                               <div class="card">
            
                                   <div class="card-body">
                                        
                                       <!----------------------Doctor---------------->
                                       <div class="form-group" hidden>
                                          <label for="Paciente"></label>
                                          <input required value="111" class="form-control" id="doctor" name="doctor" tabindex="3">
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
                                       <!--------------------Fecha de Nacimiento------------------->
                                       <div class="form-group">
                                          <label class="control-label" for="FecNac">Fecha de nacimiento:</label>
                                          <input autocomplete="off" required  class="form-control text-box single-line" id="FecNac" maxlength="10" name="FecNac" type="date" tabindex="">@error('FecNac') <span class="error text-danger">{{ $message }}</span> @enderror
                                        </div>
                                        <!--------------------Especialidad1------------------->
                                        <div class="form-group">
                                            <label class="control-label">Especialidad:</label>
                                            <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line" id="Especialidad1" maxlength="50" name="Especialidad1" type="text" required tabindex="7">                                        
                                        </div>
                                        <!------------------CedProf--------------------->
                                        <div class="form-group">                           
                                            <label class="control-label" for="CedProf">Cédula Profesional:</label>                                                        
                                            <input autofocus class="form-control text-box single-line" id="CedProf" minlength="6" maxlength="30" name="CedProf" type="text">                          
                                        </div>
                                        <!---------------------Centro--------------------->
                                        <div class="form-group">
                                            <label class="control-label" for="Centro">Centro:</label><br>
                                            <input class="form-control text-box single-line" id="Centro" maxlength="10"  name="Centro" type="tel" >
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
                                        <!---------------------Tels--------------------->
                                        <div class="form-group">
                                           <label class="control-label" for="Tels">Teléfono:</label><br>
                                           <input autocomplete="off" class="form-control text-box single-line validanumericos" id="Tels" minlength="10" maxlength="10" name="Tels" type="tel" >
                                        </div>
                                       <div class="form-group">
                                           <label class="control-label" for="email">Email:</label>
                                           <input class="form-control text-box single-line" id="email" maxlength="70" name="email" type="email" >
                                        </div>
                                    
                                    </div>                                                               
                                </div>
                            </div>
                            <!----------------------------------------Datos de Nómina (Opcional)----------------------------------------------------------->
                            <div role="tabpanel" class="tab-pane" id="Opcional" >
                               <div class="card">
                                    <div class="card-body">
                                        <!-----------------------Dirección---------------------------->
                                        <div class="form-group">                           
                                            <label class="control-label" for="Direccion">Dirección:</label>
                                            <input class="form-control text-box single-line" id="Direccion" minlength="10" maxlength="50" name="Direccion" type="text" >                            
                                        </div>
                                        <!-----------------------Colonia---------------------------->
                                       <div class="form-group">                           
                                            <label class="control-label" for="Colonia">Colonia:</label>                            
                                            <input class="form-control text-box single-line" id="Colonia" minlength="2" maxlength="25" name="Colonia" type="text" >                            
                                       </div>
                                       <!-----------------------Código Postal---------------------------->
                                      <div class="form-group">                           
                                           <label class="control-label" for="cp">Código Postal:</label>
                                           <input autocomplete="off" class="form-control text-box single-line validanumericos" id="cp" minlength="5" maxlength="10" name="cp" type="text" >                            
                                       </div>
                                       <!-----------------------Estado---------------------------->
                                       <div class="form-group">                           
                                           <label class="control-label" for="Estado">Estado:</label>
                                           <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line" id="Estado" minlength="2" maxlength="25" name="Estado" type="text" >          
                                        </div>
                                        <!-----------------------Municipio---------------------------->
                                        <div class="form-group">                           
                                           <label class="control-label" for="Municipio">Municipio:</label>
                                           <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line" minlength="2" maxlength="25" id="Municipio" name="Municipio" type="text" >                            
                                        </div>
                                    </div>
                               </div>
                           </div>
                           <!----------------------------------------------Fin del Opcional------------------------------------------------------->
                           <div style="text-align:right">
                               <a href="/doctores"> <button class="btn btn-secondary" type="button">Cancelar</button></a>
                               <button type="submit" class="btn btn-primary close-modal" >Guardar</button>
                    
                            </div>
                        </div>
                    </div>
               </form>
           </div>
       </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
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