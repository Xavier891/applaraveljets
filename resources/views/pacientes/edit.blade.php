@extends('adminlte::page')

@section('title', 'Edición')

@section('content_header')
<h1>Edición</h1>
@stop

@section('content')
<div  id="updateModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
<div class="container-fluid" style="width:40%;" >
	<div class="modal-body">
		<div id="CreaContainer">
		   <form  class="frmPacientes" id="createPacientes" action="/pacientes/{{$paciente->id}}" method="POST">
			@csrf
            @method('PUT')
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
									
									<!--------------------Nombre------------------->
									<div class="form-group">
									   <label class="control-label">Nombre:</label><b class="obligatorio">(*)</b>
									   <input autocomplete="off" onkeypress="return soloLetras(event)" required class="form-control text-box single-line" value="{{$paciente->Nombre}}" id="Nombre" minlength="2" maxlength="50" name="Nombre" type="text" tabindex="4">@error('Nombre') <span class="error text-danger">{{ $message }}</span> @enderror
									</div>
									<!--------------------Paterno------------------->
									<div class="form-group">
									   <label class="control-label">Apellido Paterno:</label><b class="obligatorio">(*)</b>
									   <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line"  value="{{$paciente->Paterno}}" id="Paterno" minlength="2" maxlength="50" name="Paterno" type="text" required tabindex="5">@error('Paterno') <span class="error text-danger">{{ $message }}</span> @enderror
									</div>
									<!--------------------Materno------------------->
									<div class="form-group">
									   <label class="control-label">Apellido Materno:</label>
									   <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line" value="{{$paciente->Materno}}" id="Materno" minlength="2" maxlength="50" name="Materno" type="text" tabindex="6">
								   </div>
								   <!--------------------Fecha de nacimiento------------------->
								   <div class="form-group">
									<label class="control-label" for="FecNac">Fecha de nacimiento:</label>
									<input required class="form-control text-box single-line" value="{{$paciente->FecNac}}" id="FecNac" maxlength="10" name="FecNac" type="date">
								  </div>
									
									<!------------------Sexo--------------------->
									<div class="form-group">
										
										<label class="control-label" for="Sexo">Género:</label><b class="obligatorio">(*)</b>
										<div class="form-check">
										   <input required class="form-check-input" id="Sexo" name="Sexo" type="radio" value="H" {{$paciente->Sexo=="H"?'Checked':''}}><label class="form-check-label">H</label> @error('Sexo') <span class="error text-danger">{{ $message }}</span> @enderror
										</div>
										<div class="form-check">
											<input class="form-check-input" id="Sexo" name="Sexo" type="radio" value="M" {{$paciente->Sexo=="M"?'Checked':''}} required><label class="form-check-label">M</label>@error('Sexo') <span class="error text-danger">{{ $message }}</span> @enderror
										</div>
									</div>
									<!------------------Empresa--------------------->
									<div class="form-group">
									   <label class="control-label" for="EmpresaPaciente">Empresa:</label><b class="obligatorio">(*)</b>
									   
									   <select class="form-control select2-hidden-accessible" id="Empresa" name="Empresa" tabindex="-1" aria-hidden="true">
										
										@foreach($empresas as $empresa)
										   <option value="{{$empresa->id}}" {{($empresa->id == $paciente->Empresa)?'selected':''}}>{{$empresa->Nombre}}</option>
										@endforeach
									   </select>
									</div>
									<!------------------Teléfono--------------------->
									<div class="form-group">
									   <label class="control-label" for="Telefono">Teléfono:</label><br>
									   <input autocomplete="off" class="form-control text-box single-line validanumericos" minlength="10" id="Telefono" maxlength="10" name="Telefono" type="tel" >
									</div>
								   <div class="form-group">
									   <label class="control-label" for="email">Email:</label>
									   <input value="{{$paciente->email}}" class="form-control text-box single-line" id="email" maxlength="70" name="email" type="email" >
				
									</div>
									<!--------------------eliminar------------------->
									<div class="form-group" hidden>
										<label class="control-label">eliminar:</label>
										<input  class="form-control text-box single-line" value="{{$paciente->eliminar}}" id="eliminar" maxlength="50" name="eliminar" type="text" tabindex="6">
									</div>
									<div class="form-group">
										<input data-val="true" id="enviarwhatsapp" name="enviarwhatsapp" type="checkbox" value="44"><input name="enviarwhatsapp" type="hidden" value="44">
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
					                   <input value="{{$paciente->Rfc}}" autofocus class="form-control text-box single-line" id="Rfc" minlength="13" maxlength="13" name="Rfc" type="text">                          
				                    </div>
				                    <div class="form-group">                           
					                   <label class="control-label" for="Calle">Calle:</label>
					                   <input value="{{$paciente->Calle}}" class="form-control text-box single-line" id="Calle" minlength="2" maxlength="50" name="Calle" type="text" >                            
				                    </div>
				                    <div class="form-group">                           
					                   <label class="control-label" for="Numero">Número:</label>
					                   <input value="{{$paciente->Numero}}" class="form-control text-box single-line" id="Numero" minlength="2" maxlength="10" name="Numero" type="text" >                            
				                    </div>
				                    <div class="form-group">                           
					                   <label class="control-label" for="Colonia">Colonia:</label>                            
					                   <input value="{{$paciente->Colonia}}" class="form-control text-box single-line" id="Colonia" minlength="2" maxlength="25" name="Colonia" type="text" >                            
				                    </div>
				                    <div class="form-group">                           
					                   <label class="control-label" for="Cp">Código Postal:</label>
					                   <input autocomplete="off" value="{{$paciente->Cp}}" class="form-control text-box single-line validanumericos" id="Cp" minlength="5" maxlength="5" name="Cp" type="text" >                            
				                    </div>
									<div class="form-group">                           
										<label class="control-label" for="Municipio">Municipio:</label>
										<input autocomplete="off" onkeypress="return soloLetras(event)" value="{{$paciente->Municipio}}" class="form-control text-box single-line" id="Municipio" minlength="2" maxlength="25" name="Municipio" type="text" >                            
									 </div>
									 <div class="form-group">                           
										<label class="control-label" for="Estado">Estado:</label>
										<input autocomplete="off" onkeypress="return soloLetras(event)" value="{{$paciente->Estado}}" class="form-control text-box single-line" id="Estado" minlength="2" maxlength="25" name="Estado" type="text" >          
									 </div>
				                    <div class="form-group">                           
					                   <label class="control-label" for="Pais">País:</label>
					                   <input autocomplete="off" onkeypress="return soloLetras(event)" value="{{$paciente->Pais}}" class="form-control text-box single-line" id="Pais" minlength="2" maxlength="25" name="Pais" type="text" >                            
				                    </div>   
			                   </div>
		                  </div>
	                   </div>
	                <!----------------------------------------------Fin del Opcional------------------------------------------------------->
	                <a href="/pacientes"> <button class="btn btn-secondary" type="button">Cancelar</button></a>
					<button type="submit" class="btn btn-primary close-modal" >Save</button>
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



