<?php

namespace App\Http\Controllers;

use App\Exposicion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ExposicionController extends Controller
{
	private $path = "admin.exposicion";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$exposiciones = Exposicion::orderBy('titulo')->paginate(5);
        return view("$this->path.index",compact('exposiciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view("$this->path.create");
    }

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Validation\ValidationException
	 */
    public function store(Request $request)
    {
    	$this->validate($request,[
    			"titulo"=>"required|alpha",
		        "duracion"=>"required"
	    ]);

    	$titulo = $request->input('titulo');
    	$duracion = $request->input('duracion');

	    DB::executeProcedure('PK_EXPOSICION.INSERTEXPOSICION', ['id' => $titulo, 'duracion' => $duracion]);
	    DB::commit();

	    return redirect()->route('exposicion.index')->with('message', 'Exposicion insertada');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exposicion  $exposicion
     * @return \Illuminate\Http\Response
     */
    public function show(Exposicion $exposicion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exposicion  $exposicion
     * @return \Illuminate\Http\Response
     */
    public function edit(Exposicion $exposicion)
    {
        return view("$this->path.edit",compact('exposicion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exposicion  $exposicion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exposicion $exposicion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exposicion  $exposicion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exposicion $exposicion)
    {
	    DB::executeProcedure('PK_EXPOSICION.DELETEEXPOSICION', ['id' => $exposicion->id]);
	    DB::commit();

	    return redirect()->route('exposicion.index')->with('message', 'Exposicion eliminada');
    }
}
