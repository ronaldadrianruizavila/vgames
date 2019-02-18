<?php

namespace App\Http\Controllers;

use App\User;
use Caffeinated\Shinobi\Models\Role;
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
	public function edit(User $usuario)
	{
		$roles = Role::get();
		return view("$this->path.edit", compact(['usuario','roles']));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \App\Sala $sala
	 * @return \Illuminate\Http\Response
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function update(Request $request, User $usuario)
	{
		//usuarios
		$usuario->update($request->all());

		//roles
		$usuario->roles()->sync($request->get('rol'));


		return redirect()->route('usuario.index')->with('message', 'usuario actualizada');
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
