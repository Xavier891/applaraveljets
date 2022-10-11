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
		   <form  class="frmdoctors" id="createdoctors" enctype="multipart/form-data" action="/doctores/{{$doctor->id}}" method="POST">
			@csrf
            @method('PUT')
			   <div id="frm-doctors" class="tabpanel">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" href="#Primero" data-toggle="tab" role="tab" aria-selected="false">Datos Personales</a>
						</li>
						<li class="nav-item" role="presentation">
							<a class="nav-link" href="#Opcional" data-toggle="tab" role="tab" aria-selected="false">Datos Opcionales</a>
						</li>
				   </ul>
	
				   <div class="tab-content">
					   <div role="tabpanel" class="tab-pane active" id="Primero">
						   <div class="card">
		
							   <div class="card-body">
									<!--------------------Nombre------------------->
									<div class="form-group">
									   <label class="control-label">Nombre:</label><b class="obligatorio">(*)</b>
									   <input autocomplete="off" onkeypress="return soloLetras(event)" required class="form-control text-box single-line" value="{{$doctor->Nombre}}" id="Nombre" minlength="2" maxlength="50" name="Nombre" type="text" tabindex="4">@error('Nombre') <span class="error text-danger">{{ $message }}</span> @enderror
									</div>
									<!--------------------Paterno------------------->
									<div class="form-group">
									   <label class="control-label">Apellido Paterno:</label><b class="obligatorio">(*)</b>
									   <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line"  value="{{$doctor->Paterno}}" id="Paterno" minlength="2" maxlength="50" name="Paterno" type="text" required tabindex="5">@error('Paterno') <span class="error text-danger">{{ $message }}</span> @enderror
									</div>
									<!--------------------Materno------------------->
									<div class="form-group">
									   <label class="control-label">Apellido Materno:</label>
									   <input autocomplete="off" onkeypress="return soloLetras(event)" class="form-control text-box single-line" value="{{$doctor->Materno}}" id="Materno" minlength="2" maxlength="50" name="Materno" type="text" tabindex="6">
								   </div>
								   <!--------------------Fecha de nacimiento------------------->
								   <div class="form-group">
									  <label class="control-label" for="FecNac">Fecha de nacimiento:</label>
									  <input required class="form-control text-box single-line" value="{{$doctor->FecNac}}" id="FecNac" maxlength="10" name="FecNac" type="date">
									</div>
									<!------------------CedProf--------------------->
									<div class="form-group">                           
										<label class="control-label" for="CedProf">Cédula profesional:</label>                                                        
										<input value="{{$doctor->CedProf}}" autofocus class="form-control text-box single-line" id="CedProf" minlength="13" maxlength="13" name="CedProf" type="text">                          
									 </div>
									 <!---------------------Centro--------------------->
									 <div class="form-group">
										<label class="control-label" for="Centro">Centro:</label><br>
										<input value="{{$doctor->Centro}}" class="form-control text-box single-line" id="Centro" minlength="10" maxlength="20" name="Centro" type="tel" >
									 </div>
									<!------------------Sexo--------------------->
									<div class="form-group">
										
										<label class="control-label" for="Sexo">Género:</label><b class="obligatorio">(*)</b>
										<div class="form-check">
										   <input required class="form-check-input" id="Sexo" name="Sexo" type="radio" value="H" {{$doctor->Sexo=="H"?'Checked':''}}><label class="form-check-label">H</label> @error('Sexo') <span class="error text-danger">{{ $message }}</span> @enderror
										</div>
										<div class="form-check">
											<input class="form-check-input" id="Sexo" name="Sexo" type="radio" value="M" {{$doctor->Sexo=="M"?'Checked':''}} required><label class="form-check-label">M</label>@error('Sexo') <span class="error text-danger">{{ $message }}</span> @enderror
										</div>
									</div>
									<!------------------Tels--------------------->
									<div class="form-group">
									   <label class="control-label" for="Telefono">Teléfono:</label><br>
									   <input autocomplete="off" value="{{$doctor->Tels}}" class="form-control text-box single-line validanumericos" id="Tels" minlength="10" maxlength="10" name="Tels" type="tel" >
									</div>
									<!------------------email--------------------->
								   <div class="form-group">
									   <label class="control-label" for="email">Email:</label>
									   <input value="{{$doctor->email}}" class="form-control text-box single-line" id="email" maxlength="70" name="email" type="email" >
				
									</div>
									<!--------------------eliminar------------------->
									<div class="form-group" hidden>
										<label class="control-label">eliminar:</label>
										<input  class="form-control text-box single-line" value="{{$doctor->eliminar}}" id="eliminar" maxlength="50" name="eliminar" type="text" tabindex="6">
									</div>
								</div>                                                               
		                    </div>
	                   </div>
	                   <!----------------------------------------Datos de Facturación (Opcional)----------------------------------------------------------->
	                   <div role="tabpanel" class="tab-pane" id="Opcional" >
		                   <div class="card">
			                   <div class="card-body">
								    <!--------------------Dirección------------------->
								    <div class="form-group">                           
									   <label class="control-label" for="Direccion">Dirección:</label>
									   <input value="{{$doctor->Direccion}}" class="form-control text-box single-line" id="Direccion" minlength="10" maxlength="50" name="Direccion" type="text" >                            
								    </div>
									<!--------------------Colonia------------------->
				                    <div class="form-group">                           
					                   <label class="control-label" for="Colonia">Colonia:</label>                            
					                   <input value="{{$doctor->Colonia}}" class="form-control text-box single-line" id="Colonia" minlength="2" maxlength="25" name="Colonia" type="text" >                            
				                    </div>
									<!--------------------Código Postal------------------->
				                    <div class="form-group">                           
					                   <label class="control-label" for="cp">Código Postal:</label>
					                   <input autocomplete="off" value="{{$doctor->cp}}" class="form-control text-box single-line validanumericos" id="cp" minlength="5" maxlength="10" name="cp" type="text" >                            
				                    </div>
				                    <!--------------------Estado------------------->
				                   <div class="form-group">                           
					                  <label class="control-label" for="Estado">Estado:</label>
					                  <input autocomplete="off" onkeypress="return soloLetras(event)" value="{{$doctor->Estado}}" class="form-control text-box single-line" id="Estado" minlength="2" maxlength="25" name="Estado" type="text" >          
				                   </div>
								   <!--------------------Municipio------------------->
				                   <div class="form-group">                           
					                  <label class="control-label" for="Municipio">Municipio:</label>
					                  <input autocomplete="off" onkeypress="return soloLetras(event)" value="{{$doctor->Municipio}}" class="form-control text-box single-line" id="Municipio" minlength="2" maxlength="25" name="Municipio" type="text" >                            
				                   </div>
			                   </div>
		                  </div>
	                   </div>
	                <!----------------------------------------------Fin del Opcional------------------------------------------------------->
	                <a href="/doctores"> <button class="btn btn-secondary" type="button">Cancelar</button></a>
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



