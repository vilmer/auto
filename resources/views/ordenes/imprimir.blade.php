<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Orden</title>
	<style>
		table {
			  border-collapse: collapse;
			  width: 100%;
			}

			table, th, td {
			  border: 1px solid black;
			}
	</style>
</head>
<body>
	<center><h1>Orden # {{ $o->id }}</h1></center>	
	<i>Información de encargado</i>
	<table>
		<tr>
			<td><strong>NOMBRES</strong></td>
			<td>{{ $o->empleado->name }}</td>
		</tr>
		<tr>
		
			<td><strong>Email</strong></td>
			<td>{{ $o->empleado->email }}</td>
		</tr>
	</table>
<br>
	<i>Información de auto</i>
	<table>
		<tr>
			<td><strong>PLACA</strong></td>
			<td>{{ $o->auto->placa }}</td>
		</tr>
		<tr>
			
			<td><strong>COLOR</strong></td>
			<td>{{ $o->auto->color }}</td>
			
		</tr>
		<tr>
			
			<td><strong>DESCRIPCIÓN</strong></td>
			<td>{{ $o->auto->descripcion ?? '...' }}</td>
		</tr>
	</table>


<br>
	<i>Información de servicios</i>
	<table>
		<tr>
			
			<td>
				<table>
					<thead>
						<tr>
						<td><strong>Nombre</strong></td>
						<td><strong>Precio</strong></td>
						<td><strong>Descripción</strong></td>
					</tr>
					</thead>
					@php($total=0)
					<tbody>
						@foreach($o->ser as $s)
						<tr>
							<td>{{ $s->nombre }}</li></td>
							<td>$ {{ $s->precio }}</td>
							<td>{{ $s->descripcion }}</td>
						</tr>
						@php($total+=$s->precio)
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<td ><strong>TOTAL</strong></td>
							<td  colspan="2"><strong>$ {{ $total }}</strong></td>
						</tr>
					</tfoot>
				</table>
			</td>
			
			
		</tr>
	</table>
<br>
		<i>Detalle de ingreso</i>
		<table>
			<tr>
				<td>
					{{ $o->detalle }}
				</td>
			</tr>
		</table>
		<i>Fecha creado: {{ $o->created_at }} <small>{{ $o->created_at->diffForHumans() }}</small></i><br>
		<i>Fecha actualizado: {{ $o->updated_at }} <small>{{ $o->updated_at->diffForHumans() }}</small></i>
		<br>
		<i>Reporte generado por: <small>{{ Auth::user()->name }}</small></i>


</body>
</html>