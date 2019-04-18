<div class="btn-group btn-group-sm" role="group" aria-label="...">
	<a href="{{ route('editarServicio',$s->id) }}" class="btn btn-primary">Editar</a>
	<button type="button" class="btn btn-danger" data-url="{{ route('eliminarServicio',$s->id) }}" onclick="eliminar(this);">Eliminar</button>
</div>