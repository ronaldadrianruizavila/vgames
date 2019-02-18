<form action="{{route('usuario.destroy',$user)}}" method="post">
	@method('DELETE')
	@csrf
	<div class="btn-group" role="group" aria-label="Basic example">
		<a href="{{route('usuario.edit',$user)}}" class="btn btn-sm btn-primary">Editar</a>
		<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
	</div>
</form>