<div class="btn-group btn-group-sm" role="group" aria-label="...">
	<a href="{{ route('imprimirOrden',$o->id) }}" class="btn btn-primary">Imprimir</a>
	<button type="button" class="btn btn-danger" data-url="{{ route('eliminarOrden',$o->id) }}" onclick="eliminar(this);">Eliminar</button>
</div>