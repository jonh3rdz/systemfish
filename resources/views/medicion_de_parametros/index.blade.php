@extends('adminlte::page')

@section('title', 'Medicion de parametros')

@section('content_header')
    <h1>Medicion de parametros</h1>
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
                
            
                        @can('crear-medicion_de_parametro')
                        <a class="btn btn-primary mb-3" href="{{ route('medicion_de_parametros.create') }}">CREAR</a>
                        @endcan
            
                        <table class="table table-striped mt-2" id="medicion_de_parametros">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Fecha</th>
                                    <th style="color:#fff;">Numero de tanque</th> 
                                    <th style="color:#fff;">cantidad</th>
                                    <th style="color:#fff;">pH</th>
                                    <th style="color:#fff;">HRPH</th>
                                    <th style="color:#fff;">Amonio</th> 
                                    <th style="color:#fff;">Nitrito</th>
                                    <th style="color:#fff;">Nitrate</th>
                                    <th style="color:#fff;">Temperatura</th> 
                                    <th style="color:#fff;">Oxigeno</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($medicion_de_parametros as $medicion_de_parametro)
                            <tr>
                                <td style="display: none;">{{ $medicion_de_parametro->id }}</td>                                
                                <td>{{ $medicion_de_parametro->fecha }}</td>
                                <td>{{ $medicion_de_parametro->numero_de_tanque }}</td>
                                <td>{{ $medicion_de_parametro->cantidad }}</td>
                                <td>{{ $medicion_de_parametro->pH }}</td>
                                <td>{{ $medicion_de_parametro->HRPH }}</td>
                                <td>{{ $medicion_de_parametro->amonio }}</td>
                                <td>{{ $medicion_de_parametro->nitrito }}</td>
                                <td>{{ $medicion_de_parametro->nitrate }}</td>
                                <td>{{ $medicion_de_parametro->temperatura }}</td>
                                <td>{{ $medicion_de_parametro->oxigeno }}</td>
                                <td>
                                    <form action="{{ route('medicion_de_parametros.destroy',$medicion_de_parametro->id) }}" method="POST">                                        
                                        @can('editar-medicion_de_parametros')
                                        <a class="btn btn-info" href="{{ route('medicion_de_parametros.edit',$medicion_de_parametro->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-medicion_de_parametro')
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
                            {!! $medicion_de_parametros->links() !!}
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
          $('#medicion_de_parametros').DataTable();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop