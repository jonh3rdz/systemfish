@extends('adminlte::page')

@section('title', 'Editar Control de tanques')

@section('content_header')
    <h1>Editar Control de tanques</h1>
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


                    <form action="{{ route('control_de_tanques.update',$control_de_tanque->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="fecha">Fecha</label>
                                   <input type="date" name="fecha" class="form-control" value="{{ $control_de_tanque->fecha }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="numero_de_tanque">Numero de tanque</label>
                                   <input type="number" name="numero_de_tanque" class="form-control" value="{{ $control_de_tanque->numero_de_tanque }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="cantidad">cantidad</label>
                                   <input type="number" name="cantidad" class="form-control" value="{{ $control_de_tanque->cantidad }}">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                   <label for="tasa_de_mortalidad">Tasa de mortalidad</label>
                                   <input type="text" name="tasa_de_mortalidad" class="form-control" value="{{ $control_de_tanque->tasa_de_mortalidad }}">
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