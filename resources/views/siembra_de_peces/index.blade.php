@extends('adminlte::page')

@section('title', 'Siembra de peces')

@section('content_header')
    <h1>Siembra de peces</h1>
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
                
            
                        @can('crear-siembra_de_pece')
                        <a class="btn btn-primary mb-3" href="{{ route('siembra_de_peces.create') }}">CREAR</a>
                        @endcan
            
                        <table class="table table-striped mt-2" id="siembra_de_peces">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Fecha</th>
                                    <th style="color:#fff;">Numero de tanque</th> 
                                    <th style="color:#fff;">Cantidad</th>                                    
                                    <th style="color:#fff;">Acciones</th>                                                                   
                              </thead>
                              <tbody>
                            @foreach ($siembra_de_peces as $siembra_de_pece)
                            <tr>
                                <td style="display: none;">{{ $siembra_de_pece->id }}</td>                                
                                <td>{{ $siembra_de_pece->fecha }}</td>
                                <td>{{ $siembra_de_pece->numero_de_tanque }}</td>
                                <td>{{ $siembra_de_pece->cantidad }}</td>
                                <td>
                                    <form action="{{ route('siembra_de_peces.destroy',$siembra_de_pece->id) }}" method="POST">                                        
                                        @can('editar-siembra_de_pece')
                                        <a class="btn btn-info" href="{{ route('siembra_de_peces.edit',$siembra_de_pece->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-siembra_de_pece')
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
                            {!! $siembra_de_peces->links() !!}
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
          $('#siembra_de_peces').DataTable();
        });
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop