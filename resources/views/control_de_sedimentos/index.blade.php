@extends('adminlte::page')

@section('title', 'Control de sedimentos')

@section('content_header')
    <h1>Control de sedimentos</h1>
@stop

@section('css')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
@endsection

@section('content')
<section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                
            
                        @can('crear-control_de_sedimento')
                        <a class="btn btn-primary mb-3" href="{{ route('control_de_sedimentos.create') }}">CREAR</a>
                        @endcan
            
                        <table class="table table-striped mt-2" id="control_de_sedimentos">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Fecha</th>
                                    <th style="color:#fff;">Numero de tanque</th> 
                                    <th style="color:#fff;">Observaciones</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($control_de_sedimentos as $control_de_sedimento)
                            <tr>
                                <td style="display: none;">{{ $control_de_sedimento->id }}</td>                                
                                <td>{{ $control_de_sedimento->fecha }}</td>
                                <td>{{ $control_de_sedimento->numero_de_tanque }}</td>
                                <td>{{ $control_de_sedimento->observaciones }}</td>
                                <td>
                                    <form action="{{ route('control_de_sedimentos.destroy',$control_de_sedimento->id) }}" method="POST">                                        
                                        @can('editar-control_de_sedimentos')
                                        <a class="btn btn-info" href="{{ route('control_de_sedimentos.edit',$control_de_sedimento->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-control_de_sedimento')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $control_de_sedimentos->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" 
            src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function () {
          $('#control_de_sedimentos').DataTable();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop