<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Control_de_peso;

class Control_de_pesoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-control_de_pesos|crear-control_de_pesos|editar-control_de_pesos|borrar-control_de_pesos')->only('index');
         $this->middleware('permission:crear-control_de_pesos', ['only' => ['create','store']]);
         $this->middleware('permission:editar-control_de_pesos', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-control_de_pesos', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $control_de_pesos = Control_de_peso::paginate(5);
        return view('control_de_pesos.index',compact('control_de_pesos'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $control_de_pesos->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_de_pesos.crear');
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
            'peso' => 'required',
        ]);
    
        Control_de_peso::create($request->all());
    
        return redirect()->route('control_de_pesos.index');
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
    public function edit(Control_de_peso $control_de_peso)
    {
        return view('control_de_pesos.editar',compact('control_de_peso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control_de_peso $control_de_peso)
    {
        request()->validate([
            'fecha' => 'required',
            'numero_de_tanque' => 'required',
            'peso' => 'required',
        ]);
    
        $control_de_peso->update($request->all());
    
        return redirect()->route('control_de_pesos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control_de_peso $control_de_peso)
    {
        $control_de_peso->delete();
    
        return redirect()->route('control_de_pesos.index');
    }
}
