@extends('adminlte::page')

@section('title', 'Estudios')

@section('content_header')
    <h1>Catálogo de Estudios</h1>
@stop

@section('content')

<div class="card">
    <div class="card-header">
        <div class="card-header">
            <h5 class="card-title">Lista de Estudios</h5>
            
        </div>
        <div class="card-body">
            
            <div class="table-responsive">
                
               <a href="estudios/create" style="text-decoration:none;color:aliceblue;"><button type="button" class="btn btn-info" ><i class="far fa fa-plus-square"></i> Agregar Estudio</button></a>

               <a href="/estudios-pdf" style="text-decoration:none;color:aliceblue;"> <button type="button" class="btn btn-info" >Imprimir Reporte</button></a>
               <hr>
            
                <!-----------------------------!!!!!!!!!!!!!!TABLA!!!!!!!!!!!!!!---------------------------------------->
                <table id="estudios" class="table table-striped" style="width:100%">
                    <thead class="thead">
                        <tr> 
                            
                            <th scope="col">Departamento</th>
                            <th scope="col">Nombre del Estudio</th>
                            <td scope="col">Acciones</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($estudios as $estudio)
                       
                        <tr>
                            
                            <td>{{ $estudio->depto }}</td>
                            <td>{{ $estudio->Nombre }}</td>
                            <td>
                                <form class="formulario" action="{{route('estudios.destroy',$estudio->id)}}" method ="POST">
                                  @csrf
                                  @method('DELETE')
                                  <a href="/estudios/{{$estudio->id}}/edit" class="btn-xs btn-primary fa fa fa-pencil"><i class="fa fa-edit"></i></a>
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
           $('#estudios').DataTable({
           "lengthMenu": [[10,50,-1], [10,50,"All"]]
        });
    });
    </script> 
    
@stop
