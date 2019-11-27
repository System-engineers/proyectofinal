@extends('layouts.main')


@section('titulo', 'Registro de Detalle Orden')

@section('extra-css')
<link href="{{URL::asset('plantilla/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@stop


@section('content')

@if ($errors->any())
<div class="alert bg-red alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
			aria-hidden="true">×</span></button>
	@foreach ($errors->all() as $error)
	<li>{{ $error }}</li>
	@endforeach

</div>
@endif

<div class="container-fluid">

	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2 class="text-center">REGISTRO DE DETALLE ORDEN</h2>
				</div>

				<div class="body">

					<form class="form-horizontal" id="form_validation" method="POST"
						action="{{ route('empleadoorden.store') }}" autocomplete="off">

						@csrf

						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="empleado_id">Empleado</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" data-toggle="modal"
								data-target="#listaEmpleados">
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control" id="empleado_id" name="empleado_id"
											readonly="readonly" required>
									</div>
								</div>
							</div>
						</div>

						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="orden_id">Escoger una Orden</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<select class="form-control show-tick" data-live-search="true" name="orden_id"
											id="orden_id">
											<option value="">Escoger</option>
											@foreach($ordenes as $orden)
											<option value="{{$orden->id}}">{{$orden->nombre}}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
						</div>

						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="id_servicio">Servicio</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<select class="form-control show-tick" data-live-search="true"
											name="id_servicio" id="id_servicio">
											<option value="">Escoger</option>
											<optgroup label="Servicios">
												@foreach($servicios as $servicio)
												<option value="s-{{$servicio->id}}" data-subtext="${{number_format($servicio->precio, 2)}}">
													{{$servicio->nombre}}</option>
												@endforeach
											</optgroup>
											<optgroup label="Especiales">
												@foreach($especiales as $especial)
												<option value="e-{{$especial->id}}" data-subtext="${{number_format($especial->precio,2)}}">
													{{$especial->servicio->nombre}}</option>
												@endforeach
											</optgroup>

										</select>
									</div>
								</div>
							</div>
						</div>





						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="cantidad">Cantidad</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control" id="cantidad" name="cantidad">
									</div>
								</div>
							</div>
						</div>



						<div class="row clearfix text-center">
							<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

								<button class="btn bg-light-blue waves-effect m-r-30" type="submit"><i
										class="material-icons">save</i>
									<span>GUARDAR</span></button>

								<a href="{{route('empleadoorden.index')}}" class="btn btn-danger waves-effect m-l-35">
									<i class="material-icons">flight_takeoff</i>
									<span>REGRESAR</span>
								</a>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>


</div>

@include('modals.modal_lista_empleados')

@stop

@section('extra-scripts')
<script src="{{URL::asset('plantilla/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
<script src="{{URL::asset('plantilla/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('plantilla/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('plantilla/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{URL::asset('plantilla/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{URL::asset('plantilla/js/pages/forms/form-validation.js')}}"></script>
<script>
	$(document).ready(function () {
		$('tr').click(function () {
			codigo = $(this).find('td:first').html();
			$('#empleado_id').val(codigo);
			$('#empleado_id').focus();
		});
	});

</script>

@stop