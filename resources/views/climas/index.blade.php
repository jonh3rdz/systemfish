@extends('adminlte::page')

@section('title', 'Clima')

@section('content_header')
    <h1>Clima</h1>
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
                
            
                        @can('crear-clima')
                        <a class="btn btn-primary mb-3" href="{{ route('climas.create') }}">CREAR</a>
                        @endcan
            
                        <table class="table table-striped mt-2" id="climas">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Fecha</th>
                                    <th style="color:#fff;">Condiciones</th> 
                                    <th style="color:#fff;">Observaciones</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($climas as $clima)
                            <tr>
                                <td style="display: none;">{{ $clima->id }}</td>                                
                                <td>{{ $clima->fecha }}</td>
                                <td>{{ $clima->condiciones }}</td>
                                <td>{{ $clima->observaciones }}</td>
                                <td>
                                    <form action="{{ route('climas.destroy',$clima->id) }}" method="POST">                                        
                                        @can('editar-climas')
                                        <a class="btn btn-info" href="{{ route('climas.edit',$clima->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-clima')
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
                            {!! $climas->links() !!}
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
          $('#climas').DataTable();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop