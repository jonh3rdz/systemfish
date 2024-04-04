<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Clima;

class ClimaController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-climas|crear-climas|editar-climas|borrar-climas')->only('index');
         $this->middleware('permission:crear-climas', ['only' => ['create','store']]);
         $this->middleware('permission:editar-climas', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-climas', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $climas = Clima::paginate(5);
        return view('climas.index',compact('climas'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $climas->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('climas.crear');
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
            'condiciones' => 'required',
            'observaciones' => 'required',
        ]);
    
        Clima::create($request->all());
    
        return redirect()->route('climas.index');
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
    public function edit(Clima $clima)
    {
        return view('climas.editar',compact('clima'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clima $clima)
    {
        request()->validate([
            'fecha' => 'required',
            'condiciones' => 'required',
            'observaciones' => 'required', 
        ]);
    
        $clima->update($request->all());
    
        return redirect()->route('climas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clima $clima)
    {
        $clima->delete();
    
        return redirect()->route('climas.index');
    }
}
