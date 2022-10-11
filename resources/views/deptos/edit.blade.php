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
		   <form  class="frmdeptos" id="updateDepto" action="/deptos/{{$depto->id}}" method="POST">
			@csrf
            @method('PUT')
			   <div id="frm-deptos" class="tabpanel">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item" role="presentation">
							<a class="nav-link active" href="#Primero" data-toggle="tab" role="tab" aria-selected="false">Datos Personales</a>
						</li>
						
				   </ul>
	
				   <div class="tab-content">
					   <div role="tabpanel" class="tab-pane active" id="Primero">
						   <div class="card">
		
							   <div class="card-body">
									<!--------------------Depto ------------------->
									<div class="form-group">
										<label class="control-label">Nombre del Departamento:</label><b class="obligatorio">(*)</b>
										<input value="{{$depto->Depto}}" autocomplete="off" onkeypress="return soloLetras(event)" required class="form-control text-box single-line" id="Depto" minlength="2" maxlength="50" name="Depto" type="text" tabindex="4">@error('Depto') <span class="error text-danger">{{ $message }}</span> @enderror
									</div>
									
									
								</div>                                                               
		                    </div>
	                   </div>
	                   <a href="/deptos"> <button class="btn btn-secondary" type="button">Cancelar</button></a>
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



