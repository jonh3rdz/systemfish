@extends('adminlte::page')

@section('title', 'Editar Medicion de parametros')

@section('content_header')
    <h1>Editar Medicion de parametros</h1>
@stop

@section('content')
<section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">                            
                   
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif


                    <form action="{{ route('medicion_de_parametros.update',$medicion_de_parametro->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="fecha">Fecha</label>
                                   <input type="date" name="fecha" class="form-control" value="{{ $medicion_de_parametro->fecha }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="numero_de_tanque">Numero de tanque</label>
                                   <input type="number" name="numero_de_tanque" class="form-control" value="{{ $medicion_de_parametro->numero_de_tanque }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="cantidad">Cantidad</label>
                                   <input type="number" name="cantidad" class="form-control" value="{{ $medicion_de_parametro->cantidad }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="pH">pH</label>
                                   <input type="text" name="pH" class="form-control" value="{{ $medicion_de_parametro->pH }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="HRPH">HRPH</label>
                                   <input type="text" name="HRPH" class="form-control" value="{{ $medicion_de_parametro->HRPH }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="amonio">Amonio</label>
                                   <input type="text" name="amonio" class="form-control" value="{{ $medicion_de_parametro->amonio }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="nitrito">Nitrito</label>
                                   <input type="text" name="nitrito" class="form-control" value="{{ $medicion_de_parametro->nitrito }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="nitrate">Nitrate</label>
                                   <input type="text" name="nitrate" class="form-control" value="{{ $medicion_de_parametro->nitrate }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="temperatura">Temperatura</label>
                                   <input type="text" name="temperatura" class="form-control" value="{{ $medicion_de_parametro->temperatura }}">
                                </div>
                            </div> 
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="oxigeno">Oxigeno</label>
                                   <input type="text" name="oxigeno" class="form-control" value="{{ $medicion_de_parametro->oxigeno }}">
                                </div>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Guardar</button>                           
                        </div>
                    </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop