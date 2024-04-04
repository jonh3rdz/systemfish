<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Siembra_de_pece;

class Siembra_de_peceController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-siembra_de_peces|crear-siembra_de_peces|editar-siembra_de_peces|borrar-siembra_de_peces')->only('index');
         $this->middleware('permission:crear-siembra_de_peces', ['only' => ['create','store']]);
         $this->middleware('permission:editar-siembra_de_peces', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-siembra_de_peces', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Con paginación
        $siembra_de_peces = Siembra_de_pece::paginate(5);
        return view('siembra_de_peces.index',compact('siembra_de_peces'));
        //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $siembra_de_peces->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('siembra_de_peces.crear');
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
        ]);
    
        Siembra_de_pece::create($request->all());
    
        return redirect()->route('siembra_de_peces.index');
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
    public function edit(Siembra_de_pece $siembra_de_pece)
    {
        return view('siembra_de_peces.editar',compact('siembra_de_pece'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Siembra_de_pece $siembra_de_pece)
    {
        request()->validate([
            'fecha' => 'required',
            'numero_de_tanque' => 'required',
            'cantidad' => 'required',
        ]);
    
        $siembra_de_pece->update($request->all());
    
        return redirect()->route('siembra_de_peces.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Siembra_de_pece $siembra_de_pece)
    {
        $siembra_de_pece->delete();
    
        return redirect()->route('siembra_de_peces.index');
    }
}
