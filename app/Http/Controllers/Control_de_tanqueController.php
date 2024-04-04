<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Control_de_tanque;

class Control_de_tanqueController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-control_de_tanques|crear-control_de_tanques|editar-control_de_tanques|borrar-control_de_tanques')->only('index');
         $this->middleware('permission:crear-control_de_tanques', ['only' => ['create','store']]);
         $this->middleware('permission:editar-control_de_tanques', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-control_de_tanques', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $control_de_tanques = Control_de_tanque::paginate(5);
        return view('control_de_tanques.index',compact('control_de_tanques'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $control_de_tanques->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('control_de_tanques.crear');
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
            'tasa_de_mortalidad' => 'required',
        ]);
    
        Control_de_tanque::create($request->all());
    
        return redirect()->route('control_de_tanques.index');
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
    public function edit(Control_de_tanque $control_de_tanque)
    {
        return view('control_de_tanques.editar',compact('control_de_tanque'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Control_de_tanque $control_de_tanque)
    {
        request()->validate([
            'fecha' => 'required',
            'numero_de_tanque' => 'required',
            'cantidad' => 'required',
            'tasa_de_mortalidad' => 'required',
        ]);
    
        $control_de_tanque->update($request->all());
    
        return redirect()->route('control_de_tanques.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Control_de_tanque $control_de_tanque)
    {
        $control_de_tanque->delete();
    
        return redirect()->route('control_de_tanques.index');
    }
}
