@extends('adminlte::page')

@section('title', 'Registro')

@section('content_header')
<h1>Añadir registros</h1>
@stop

@section('content')
<div data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
<div class="container-fluid" style="width:40%;">
    <div class="modal-body">
        <div id="CreaContainer">
               <form  class="frmPacientes" id="createPacientes" action="/deptos" method="POST">
                @csrf
                   <div id="frm-pacientes" class="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" href="#Primero" data-toggle="tab" role="tab" aria-selected="false">Datos Personales</a>
                            </li>
                       </ul>
                       <div class="tab-content">
                           <div role="tabpanel" class="tab-pane active" id="Primero">
                               <div class="card">
            
                                   <div class="card-body">
                                    @if($message = Session::get("error"))
                                    <p>{{$message}}</p>
                                    @endif
                                    
                                       <!--------------------Depto ------------------->
                                       <div class="form-group">
                                           <label class="control-label">Nombre del Departamento:</label><b class="obligatorio">(*)</b>
                                           <input required class="form-control text-box single-line" id="Depto" minlength="2" maxlength="50" name="Depto" type="text" required tabindex="4">@error('Depto') <span class="error text-danger">{{ $message }}</span> @enderror
                                       </div>
                                        <!--------------------eliminar------------------->
									    <div class="form-group" hidden>
										   <label class="control-label">eliminar:</label>
										   <input  class="form-control text-box single-line" value="1" id="eliminar" maxlength="50" name="eliminar" type="text" tabindex="6">
									    </div>
                                        
                                    </div>                                                               
                               </div>
                            </div>
                           <div style="text-align:right">
                               <a href="/deptos"> <button class="btn btn-secondary" type="button">Cancelar</button></a>
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
    
@stop