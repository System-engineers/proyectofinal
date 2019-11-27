@extends('layouts.main')


@section('titulo', 'Actualizacion de Categorias y Servicios')

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
					<h2 class="text-center">ACTUALIZACION DE CATEGORIAS Y SERVICIOS</h2>
				</div>

				<div class="body">

					<form class="form-horizontal" id="form_validation" method="POST"
						action="{{ route('categoria.update', $categoria->id) }}" autocomplete="off">

                        
                        @csrf
                        @method('PATCH')

						<hr>

						<h4 class="text-center font-italic col-teal">Actualizar Categoria o Seleccionar</h4>

						<hr>


						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="nombre">Categoria</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
                                    <input type="text" class="form-control" id="nombre" name="nombre" value="{{$categoria->nombre}}">
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
										>{{$categoria->descripcion}}</textarea>
									</div>
								</div>
							</div>
						</div>

						<hr>

						<h4 class="text-center font-italic col-teal">Actualizar Servicios</h4>

                        <hr>
                        
                        @foreach ($categoria->servicios as  $servicio)

                    <h4 class="text-center font-italic col-teal">Servicion N° {{$loop->iteration}}</h4>


                        <div class="row clearfix">
                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="nombre_servicio">Servicio</label>
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="hidden" name="id_servicio[]" value="{{$servicio->id}}"> 
                                            <input type="text" class="form-control"
                                                name="nombre_servicio[]" value="{{$servicio->nombre}}">
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
                                            <input type="number" class="form-control"  name="precio[]" value="{{$servicio->precio}}">
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
                                            <textarea class="form-control"
                                        name="descripcion_servicio[]">{{$servicio->descripcion}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            
                        @endforeach

						

						<div class="row clearfix text-center">
							<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

								<button class="btn bg-light-blue waves-effect m-r-30" type="submit"><i
										class="material-icons">save</i>
									<span>ACTUALIZAR</span></button>

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