@extends('layouts.main')


@section('titulo', 'Listado de Usuarios')

@section('extra-css')
<link href="{{URL::asset('plantilla/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}"
	rel="stylesheet">
@stop


@section('content')

@include('layouts.success')

<div class="container-fluid">
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2 class="text-center">
						LISTA DE USUARIOS
					</h2>
					<a href="{{route('users.create')}}"
						class="btn bg-orange btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip"
						data-placement="right" title="" data-original-title="Crear nuevo registro">
						<i class="material-icons">save</i>
					</a>
				</div>
				<div class="body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
							<thead>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Email</th>
									<th>Roles</th>
									<th>Accion</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Nombre</th>
									<th>Email</th>
									<th>Roles</th>
									<th>Accion</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($data as $key => $user)
								<tr>
									<td>{{ ++$i }}</td>
									<td>{{ $user->name }}</td>
									<td>{{ $user->email }}</td>
									<td>
											@if(!empty($user->getRoleNames()))
											@foreach($user->getRoleNames() as $v)
											<label class="badge badge-success">{{ $v }}</label>
											@endforeach
											@endif
									</td>
									<td class="text-center">
										<a href="{{route('users.edit', $user->id)}}"
											class="btn bg-pink waves-effect btn-sm" data-toggle="tooltip"
											data-placement="right" title="" data-original-title="Editar"><i
												class="material-icons">border_color</i></a>
										<form action="{{route('users.destroy', $user->id)}}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn bg-red waves-effect btn-sm"
												data-toggle="tooltip" data-placement="right" title=""
												data-original-title="Eliminar"><i
													class="material-icons">delete</i></button>
										</form>

									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop



@section('extra-scripts')
<script src="{{URL::asset('plantilla/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('plantilla/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('plantilla/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{URL::asset('plantilla/js/pages/ui/tooltips-popovers.js')}}"></script>
@stop