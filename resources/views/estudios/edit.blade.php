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
		   <form  class="frmestudios" id="createestudios" action="/estudios/{{$estudio->id}}" method="POST">
			@csrf
            @method('PUT')
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
										<input autocomplete="off" value="{{$estudio->Nombre}}" onkeypress="return soloLetras(event)" required class="form-control text-box single-line" id="Nombre" minlength="2" maxlength="50" name="Nombre" type="text" tabindex="4">@error('Nombre') <span class="error text-danger">{{ $message }}</span> @enderror
									 </div>
									 <!--------------------Abreviatura------------------->
									 <div class="form-group">
										<label class="control-label">Abreviatura:</label><b class="obligatorio">(*)</b>
										<input autocomplete="off" value="{{$estudio->Abreviatura}}" onkeypress="return soloLetras(event)" class="form-control text-box single-line" id="Abreviatura" minlength="2" maxlength="50" name="Abreviatura" type="text" tabindex="5">@error('Abreviatura') <span class="error text-danger">{{ $message }}</span> @enderror
									 </div>
									 <!--------------------DatosTecnicos------------------->
									 <div class="form-group">
										<label class="control-label">Datos Tecnicos:</label>
										<input autocomplete="off" value="{{$estudio->DatosTecnicos}}" onkeypress="return soloLetras(event)" class="form-control text-box single-line" id="DatosTecnicos" minlength="2" maxlength="50" name="DatosTecnicos" type="text" tabindex="6">
										<p class="warnings" id="warning_Materno"></p>
									</div>
									<!------------------Departamento--------------------->
									<div class="form-group">
									   <label class="control-label" for="Empresaestudio">Departamento:</label><b class="obligatorio">(*)</b>
									   
									   <select class="form-control select2-hidden-accessible" id="Departamento" name="Departamento" tabindex="-1" aria-hidden="true">
										
										@foreach($deptos as $depto)
										   <option value="{{$depto->id}}" {{($depto->id == $estudio->depto)?'selected':''}}>{{$depto->Depto}}</option>
										@endforeach
									   </select>
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
					                   <input value="{{$estudio->Rfc}}" autofocus class="form-control text-box single-line" id="Rfc" minlength="13" maxlength="13" name="Rfc" type="text">                          
				                    </div>
				                    <div class="form-group">                           
					                   <label class="control-label" for="Calle">Calle:</label>
					                   <input value="{{$estudio->Calle}}" class="form-control text-box single-line" id="Calle" minlength="2" maxlength="50" name="Calle" type="text" >                            
				                    </div>
				                    <div class="form-group">                           
					                   <label class="control-label" for="Numero">Número:</label>
					                   <input value="{{$estudio->Numero}}" class="form-control text-box single-line" id="Numero" minlength="2" maxlength="10" name="Numero" type="text" >                            
				                    </div>
				                    <div class="form-group">                           
					                   <label class="control-label" for="Colonia">Colonia:</label>                            
					                   <input value="{{$estudio->Colonia}}" class="form-control text-box single-line" id="Colonia" minlength="2" maxlength="25" name="Colonia" type="text" >                            
				                    </div>
				                    <div class="form-group">                           
					                   <label class="control-label" for="Cp">Código Postal:</label>
					                   <input autocomplete="off" value="{{$estudio->Cp}}" class="form-control text-box single-line validanumericos" id="Cp" minlength="5" maxlength="5" name="Cp" type="text" >                            
				                    </div>
									<div class="form-group">                           
										<label class="control-label" for="Municipio">Municipio:</label>
										<input autocomplete="off" onkeypress="return soloLetras(event)" value="{{$estudio->Municipio}}" class="form-control text-box single-line" id="Municipio" minlength="2" maxlength="25" name="Municipio" type="text" >                            
									 </div>
									 <div class="form-group">                           
										<label class="control-label" for="Estado">Estado:</label>
										<input autocomplete="off" onkeypress="return soloLetras(event)" value="{{$estudio->Estado}}" class="form-control text-box single-line" id="Estado" minlength="2" maxlength="25" name="Estado" type="text" >          
									 </div>
				                    <div class="form-group">                           
					                   <label class="control-label" for="Pais">País:</label>
					                   <input autocomplete="off" onkeypress="return soloLetras(event)" value="{{$estudio->Pais}}" class="form-control text-box single-line" id="Pais" minlength="2" maxlength="25" name="Pais" type="text" >                            
				                    </div>   
			                   </div>
		                  </div>
	                   </div>
	                <!----------------------------------------------Fin del Opcional------------------------------------------------------->
	                <a href="/estudios"> <button class="btn btn-secondary" type="button">Cancelar</button></a>
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



