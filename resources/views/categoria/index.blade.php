@extends('layouts.main')


@section('titulo', 'Listado de Categorias y Servicios')

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
						LISTA DE CATEGORIAS
					</h2>
					@can('categoria-create')
					<a href="{{route('categoria.create')}}"
						class="btn bg-orange btn-circle waves-effect waves-circle waves-float" data-toggle="tooltip"
						data-placement="right" title="" data-original-title="Crear nuevo registro">
						<i class="material-icons">save</i>
					</a>
					@endcan
				</div>
				<div class="body">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
							<thead>
								<tr>
									<th>#</th>
									<th>Categoria</th>
									<th>Servicios</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>#</th>
									<th>Categoria</th>
									<th>Servicios</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($categorias as $categoria)
								<tr>
									<td>{{$loop->iteration}}</td>
									<td>{{$categoria->nombre}}</td>
									<td>
										@foreach($categoria->servicios as $servicio)
										<li>{{$servicio->nombre}}</li>
										@endforeach
									</td>
									<td class="text-center">
										@can('categoria-edit')

										<a href="{{route('categoria.edit', $categoria->id)}}"
											class="btn bg-pink waves-effect btn-sm" data-toggle="tooltip"
											data-placement="right" title="" data-original-title="Editar"><i
												class="material-icons">border_color</i></a>
										@endcan
									</td>

									<td class="text-center">
										@can('categoria-delete')

										<form action="{{route('categoria.destroy', $categoria->id)}}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" class="btn bg-red waves-effect btn-sm"
												data-toggle="tooltip" data-placement="right" title=""
												data-original-title="Eliminar"><i
													class="material-icons">delete</i></button>
										</form>
										@endcan
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

@include('modals.modal_vacio')

@stop



@section('extra-scripts')
<script src="{{URL::asset('plantilla/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('plantilla/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('plantilla/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{URL::asset('plantilla/js/pages/ui/tooltips-popovers.js')}}"></script>
@stop