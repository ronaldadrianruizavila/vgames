<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	private $path = "admin.user";

	public function index()
	{
		$users = User::orderby('name')->paginate(5);
		return view("$this->path.index", compact('users'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view("$this->path.create", compact('eventos'));
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
		$this->validate($request, [
				'nombre' => 'required',
		]);

		$nombre = $request->input('nombre');
		$sesion_id = $request->input('sesion_id');

		DB::executeProcedure('PK_SALAS.INSERTSALA', ['nombre' => $nombre, 'sesion_id' => $sesion_id]);
		DB::commit();


		return redirect()->route('sala.index')->with('message', 'Sala insertada');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Sala $sala
	 * @return \Illuminate\Http\Response
	 */
	public function show(Sala $sala)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Sala $sala
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Request $request,Sala $sala)
	{
		$sesiones = Sesion::where('sala_id','=',$sala->id)->select('id','nombre')->get('id');
		if ($request->ajax()){
			return response()->json($sesiones);
		}
		return view("$this->path.edit", compact(['sala']));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Sala $sala
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function update(Request $request, Sala $sala)
	{
		$this->validate($request, [
				'nombre' => 'required'
		]);

		$nombre = $request->input('nombre');
		$estado = $request->input('estado');

		DB::executeProcedure('PK_SALAS.UPDATESALA', ['ide' => $sala->id, $estado, 'nombre' => $nombre]);
		DB::commit();

		return redirect()->route('sala.index')->with('message', 'Sala actualizada');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Sala $sala
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Sala $sala)
	{
		DB::executeProcedure('PK_SALAS.DELETESALA', ['ide' => $sala->id]);
		DB::commit();
		return redirect()->route('sala.index')->with('message', 'Sala eliminada');
	}
}
