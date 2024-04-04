<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Control_de_insumo;

class Control_de_insumoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-control_de_insumos|crear-control_de_insumos|editar-control_de_insumos|borrar-control_de_insumos')->only('index');
         $this->middleware('permission:crear-control_de_insumos', ['only' => ['create','store']]);
         $this->middleware('permission:editar-control_de_insumos', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-control_de_insumos', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $control_de_insumos = Control_de_insumo::paginate(5);
        return view('control_de_insumos.index',compact('control_de_insumos'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $control_de_insumos->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_de_insumos.crear');
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
            'melaza' => 'required',
            'boitec' => 'required',
            'concentrado' => 'required',
        ]);
    
        Control_de_insumo::create($request->all());
    
        return redirect()->route('control_de_insumos.index');
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
    public function edit(Control_de_insumo $control_de_insumo)
    {
        return view('control_de_insumos.editar',compact('control_de_insumo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control_de_insumo $control_de_insumo)
    {
        request()->validate([
            'fecha' => 'required',
            'numero_de_tanque' => 'required',
            'melaza' => 'required',
            'boitec' => 'required',
            'concentrado' => 'required',
        ]);
    
        $control_de_insumo->update($request->all());
    
        return redirect()->route('control_de_insumos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control_de_insumo $control_de_insumo)
    {
        $control_de_insumo->delete();
    
        return redirect()->route('control_de_insumos.index');
    }
}
