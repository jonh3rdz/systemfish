@extends('adminlte::page')

@section('title', 'Distribuidora')

@section('content_header')
    <h1>Distribuidora</h1>
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
                
            
                        @can('crear-distribuidora')
                        <a class="btn btn-primary mb-3" href="{{ route('distribuidoras.create') }}">CREAR</a>
                        @endcan
            
                        <table class="table table-striped mt-2" id="distribuidoras">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Nombre</th>
                                    <th style="color:#fff;">Observaciones</th>
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($distribuidoras as $distribuidora)
                            <tr>
                                <td style="display: none;">{{ $distribuidora->id }}</td>                                
                                <td>{{ $distribuidora->nombre }}</td>
                                <td>{{ $distribuidora->observaciones }}</td>
                                <td>
                                    <form action="{{ route('distribuidoras.destroy',$distribuidora->id) }}" method="POST">                                        
                                        @can('editar-distribuidoras')
                                        <a class="btn btn-info" href="{{ route('distribuidoras.edit',$distribuidora->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-distribuidora')
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
                            {!! $distribuidoras->links() !!}
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
          $('#distribuidoras').DataTable();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop