<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Distribuidora;

class DistribuidoraController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-distribuidoras|crear-distribuidoras|editar-distribuidoras|borrar-distribuidoras')->only('index');
         $this->middleware('permission:crear-distribuidoras', ['only' => ['create','store']]);
         $this->middleware('permission:editar-distribuidoras', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-distribuidoras', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $distribuidoras = Distribuidora::paginate(5);
        return view('distribuidoras.index',compact('distribuidoras'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $distribuidoras->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('distribuidoras.crear');
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
            'nombre' => 'required',
            'observaciones' => 'required',
        ]);
    
        Distribuidora::create($request->all());
    
        return redirect()->route('distribuidoras.index');
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
    public function edit(Distribuidora $distribuidora)
    {
        return view('distribuidoras.editar',compact('distribuidora'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribuidora $distribuidora)
    {
        request()->validate([
            'nombre' => 'required',
            'observaciones' => 'required',
        ]);
    
        $distribuidora->update($request->all());
    
        return redirect()->route('distribuidoras.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Distribuidora $distribuidora)
    {
        $distribuidora->delete();
    
        return redirect()->route('distribuidoras.index');
    }
}
