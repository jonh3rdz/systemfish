<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Control_de_sedimento;

class Control_de_sedimentoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-control_de_sedimentos|crear-control_de_sedimentos|editar-control_de_sedimentos|borrar-control_de_sedimentos')->only('index');
         $this->middleware('permission:crear-control_de_sedimentos', ['only' => ['create','store']]);
         $this->middleware('permission:editar-control_de_sedimentos', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-control_de_sedimentos', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $control_de_sedimentos = Control_de_sedimento::paginate(5);
        return view('control_de_sedimentos.index',compact('control_de_sedimentos'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $control_de_sedimentos->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_de_sedimentos.crear');
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
            'observaciones' => 'required',
        ]);
    
        Control_de_sedimento::create($request->all());
    
        return redirect()->route('control_de_sedimentos.index');
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
    public function edit(Control_de_sedimento $control_de_sedimento)
    {
        return view('control_de_sedimentos.editar',compact('control_de_sedimento'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control_de_sedimento $control_de_sedimento)
    {
        request()->validate([
            'fecha' => 'required',
            'numero_de_tanque' => 'required',
            'observaciones' => 'required',
        ]);
    
        $control_de_sedimento->update($request->all());
    
        return redirect()->route('control_de_sedimentos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control_de_sedimento $control_de_sedimento)
    {
        $control_de_sedimento->delete();
    
        return redirect()->route('control_de_sedimentos.index');
    }
}
