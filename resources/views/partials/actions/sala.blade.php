<form action="{{route('sala.destroy',$sala)}}" method="post">
	@method('DELETE')
	@csrf
	<div class="btn-group" role="group" aria-label="Basic example">
		<a href="{{route('sala.edit',$sala)}}" class="btn btn-sm btn-primary">Editar</a>
		<button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
	</div>
</form>