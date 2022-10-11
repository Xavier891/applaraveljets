@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Catálogo de Doctores</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-light">  
            <div class="card-header" hidden>
                <h3 class="card-title">Buscar Doctor</h3>
            </div> 
           
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        <div class="card-header">
            <h5 class="card-title">Lista de Doctores</h5>
            
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                
               <a href="doctores/create" style="text-decoration:none;color:aliceblue;"><button type="button" class="btn btn-info" ><i class="far fa fa-plus-square"></i> Agregar Doctor</button></a>

               <a href="/doctores-pdf" style="text-decoration:none;color:aliceblue;"> <button type="button" class="btn btn-info" >Imprimir Reporte</button></a>
               <hr>
            
                <!-----------------------------!!!!!!!!!!!!!!TABLA!!!!!!!!!!!!!!---------------------------------------->
                <table id="pacientes" class="table table-striped" style="width:100%">
                    <thead class="thead">
                        <tr> 
                            
                            <th scope="col">Sucursal</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <td scope="col">Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($doctores as $doctor)
                       
                        <tr>
                            
                            <td>{{ $doctor->sucursal }}</td>
                            <td>{{ $doctor->Nombre }} {{ $doctor->Paterno }} {{ $doctor->Materno }}</td>
                            <td>{{ $doctor->FecNac }}</td>
                            <td>
                                <form class="formulario" action="{{route('doctores.destroy',$doctor->id)}}" method ="POST">
                                  @csrf
                                  @method('DELETE')
                                  <a href="/doctores/{{$doctor->id}}/edit" class="btn-xs btn-primary fa fa fa-pencil"><i class="fa fa-edit"></i></a>
                                  <button class="btn-xs btn btn-danger"><i class="fa fa-trash"></i></button>
                               </form>
                           </td>
                        @endforeach
                    </tbody>
                
                </table>
               
            </div>
        </div>
    </div>
</div>


@stop

@section('footer')
<footer class="main-footer">
    <div class="float-right d-none d-sm-block"><b>Versión</b> a.0.0.0.20210310</div>
    <strong>©2022 <a href="https://www.inadware.com.mx/">Inadware de México, S. de R.L.</a></strong>
</footer>
@stop

@section('css')
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">
@stop
@section('js')
    <script> console.log('Hi!'); </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if(session('eliminar')=='Echo')
    <script>
        Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
    </script>
    @endif
    <script>
        $('.formulario').submit(function(e){
            e.preventDefault();
            Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    
    this.submit();
  }
})
        });
        
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
    <script>
        $(document).ready(function () {
           $('#pacientes').DataTable({
           "lengthMenu": [[10,50,-1], [10,50,"All"]]
        });
    });
    </script> 
    {{-- <script>
        $(document).ready(function () {
            //Se posiciona y marca el primer campo disponible.
            $('input:visible:enabled:first').focus();
            $('input:visible:enabled:first').select();
    
            $("#Pacientes").select2({
                placeholder: "Buscar Paciente...",
                minimumInputLength: 3,
                theme: "bootstrap-5",
                allowClear: true,
                width: '100%',
                ajax: {
                    url: '../WebService/DropNombrePacientes',
                    contentType: "application/json; charset=utf-8",
                    data: function (params) {
                        var query =
                        {
                            filtro: params.term,
                        };
                        return query;
                    },
                    processResults: function (result) {
                        return {
                            results: $.map(result, function (item) {
                                return {
                                    id: item.id,
                                    text: item.text
                                };
                            }),
                        };
                    }
                }
            });
    
            ActivarFiltro();
        });
    
        function ActivarFiltro() {
            if (document.getElementById('opcion1').checked) {
                document.getElementById("f1").disabled = true;
                document.getElementById("fecha_fin").disabled = true;
                document.getElementById("buscapor").disabled = false;
                $('#Pacientes').focus();
                $('#Pacientes').select();
            }
    
            if (document.getElementById('opcion2').checked) {
                document.getElementById("f1").disabled = false;
                document.getElementById("fecha_fin").disabled = false;
                document.getElementById("buscapor").disabled = true;
                $('#Pacientes').focus();
                $('#Pacientes').select();
            }
    
        }
    
    </script> --}}
@stop
