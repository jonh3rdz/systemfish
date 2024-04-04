<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Medicion_de_parametro;

class Medicion_de_parametroController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-medicion_de_parametros|crear-medicion_de_parametros|editar-medicion_de_parametros|borrar-medicion_de_parametros')->only('index');
         $this->middleware('permission:crear-medicion_de_parametros', ['only' => ['create','store']]);
         $this->middleware('permission:editar-medicion_de_parametros', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-medicion_de_parametros', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $medicion_de_parametros = Medicion_de_parametro::paginate(5);
        return view('medicion_de_parametros.index',compact('medicion_de_parametros'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $medicion_de_parametros->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicion_de_parametros.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'fecha' => 'required',
            'numero_de_tanque' => 'required',
            'cantidad' => 'required',
            'pH' => 'required',
            'HRPH' => 'required',
            'amonio' => 'required',
            'nitrito' => 'required',
            'nitrate' => 'required',
            'temperatura' => 'required',
            'oxigeno' => 'required',
        ]);
    
        Medicion_de_parametro::create($request->all());
    
        return redirect()->route('medicion_de_parametros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicion_de_parametro $medicion_de_parametro)
    {
        return view('medicion_de_parametros.editar',compact('medicion_de_parametro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicion_de_parametro $medicion_de_parametro)
    {
        request()->validate([
            'fecha' => 'required',
            'numero_de_tanque' => 'required',
            'cantidad' => 'required',
            'pH' => 'required',
            'HRPH' => 'required',
            'amonio' => 'required',
            'nitrito' => 'required',
            'nitrate' => 'required',
            'temperatura' => 'required',
            'oxigeno' => 'required',
        ]);
    
        $medicion_de_parametro->update($request->all());
    
        return redirect()->route('medicion_de_parametros.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicion_de_parametro $medicion_de_parametro)
    {
        $medicion_de_parametro->delete();
    
        return redirect()->route('medicion_de_parametros.index');
    }
}
