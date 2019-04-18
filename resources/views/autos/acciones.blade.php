<div class="btn-group btn-group-sm" role="group" aria-label="...">
	<a href="{{ route('editarAuto',$s->id) }}" class="btn btn-primary">Editar</a>
	<button type="button" class="btn btn-danger" data-url="{{ route('eliminarAuto',$s->id) }}" onclick="eliminar(this);">Eliminar</button>
</div>