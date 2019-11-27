@extends('layouts.main')


@section('titulo', 'Registro de Categorias y Servicios')

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
					<h2 class="text-center">REGISTRO DE CATEGORIAS Y SERVICIOS</h2>
				</div>

				<div class="body">

					<form class="form-horizontal" id="form_validation" method="POST"
						action="{{ route('categoria.store') }}" autocomplete="off">

						@csrf

						<hr>

						<h4 class="text-center font-italic col-teal">Crear Categoria o Seleccionar</h4>

						<hr>


						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="nombre">Categoria</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control" id="nombre" name="nombre">
									</div>
								</div>
							</div>
						</div>


						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="descripcion_paquete">Descripcion Categoria:</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<textarea class="form-control" id="descripcion" name="descripcion"
											></textarea>
									</div>
								</div>
							</div>
						</div>

						<div class="row clearfix">
								<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
									<label for="categoria_id">Escoger una Categoria Existente</label>
								</div>
								<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
									<div class="form-group">
										<div class="form-line">
											<select class="form-control show-tick" data-live-search="true" name="categoria_id" id="categoria_id">
												<option value="">Escoger</option>	
												@foreach($categorias as $categoria)
													<option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
												@endforeach
											</select>
										</div>
									</div>
								</div>
						</div>
	

						<hr>

						<h4 class="text-center font-italic col-teal">Crear Servicio</h4>

						<hr>

						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="nombre_servicio">Servicio</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control" id="nombre_servicio"
											name="nombre_servicio" >
									</div>
								</div>
							</div>
						</div>

						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="precio">Precio</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="number" class="form-control" id="precio" name="precio"
											>
									</div>
								</div>
							</div>
						</div>

						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="descripcion_servicio">Descripcion Servicio:</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<textarea class="form-control" id="descripcion_servicio"
											name="descripcion_servicio"></textarea>
									</div>
								</div>
							</div>
						</div>


						<div class="row clearfix text-center">
							<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

								<button class="btn bg-light-blue waves-effect m-r-30" type="submit"><i
										class="material-icons">save</i>
									<span>GUARDAR</span></button>

								<a href="{{route('categoria.index')}}" class="btn btn-danger waves-effect m-l-35">
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


@stop



@section('extra-scripts')
<script src="{{URL::asset('plantilla/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>
<script src="{{URL::asset('plantilla/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{URL::asset('plantilla/js/pages/forms/form-validation.js')}}"></script>
@stop