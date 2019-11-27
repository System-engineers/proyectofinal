@extends('layouts.main')


@section('titulo', 'Registro de Ordenes')


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
					<h2 class="text-center">REGISTRO DE ORDENES</h2>
				</div>

				<div class="body">

					<form class="form-horizontal" id="form_validation" method="POST"
						action="{{ route('orden.store') }}" autocomplete="off">

                        @csrf
                        
                        <div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="cliente_id">Cliente</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7" data-toggle="modal"
								data-target="#listaClientes">
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control" id="cliente_id" name="cliente_id"
											readonly="readonly" required>
									</div>
								</div>
							</div>
						</div>


						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="nombre">Nombre</label>
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
								<label for="detalle">Detalle</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control" id="detalle" name="detalle">
									</div>
								</div>
							</div>
						</div>

                        <div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="fecha_entrada">Fecha Entrada</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="date" class="form-control" id="fecha_entrada" name="fecha_entrada">
									</div>
								</div>
							</div>
                        </div>
                        
                        <div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="fecha_salida">Fecha Salida</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="date" class="form-control" id="fecha_salida" name="fecha_salida">
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

@include('modals.modal_lista_clientes')

@stop

@section('extra-scripts')
<script src="{{URL::asset('plantilla/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('plantilla/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
<script src="{{URL::asset('plantilla/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="{{URL::asset('plantilla/plugins/jquery-validation/jquery.validate.js')}}"></script>
<script src="{{URL::asset('plantilla/js/pages/forms/form-validation.js')}}"></script>
<script>
	$(document).ready(function() {
		$('tr').click(function() {    
			codigo = $(this).find('td:first').html();
			$('#cliente_id').val(codigo);
			$('#cliente_id').focus();	    
		});
	});	

</script>

@stop



