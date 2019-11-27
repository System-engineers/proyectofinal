@extends('layouts.main')


@section('titulo', 'Actualizacion de Clientes y Servicios')


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
					<h2 class="text-center">ACTUALIZACION DE CLIENTES Y SERVICIOS</h2>
				</div>

				<div class="body">

					<form class="form-horizontal" id="form_validation" method="POST"
						action="{{ route('cliente.update', $cliente->id) }}" autocomplete="off">

                        @csrf
                        @method('PATCH')

                        <div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="cliente_id">Cliente</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control" id="cliente" name="cliente"
                                    readonly="readonly" value="{{$cliente->nombres}}">
									</div>
								</div>
							</div>
						</div>



						
						<hr>

						<h4 class="text-center font-italic col-teal">Añadir Servicio especial</h4>

						<hr>

						<div class="col-lg-12">


							<div class="demo-checkbox text-center">
                                @foreach($servicios as $servicio)
                                @php($precio=0)
                                @php($encontre=0)
                                @foreach($cliente->servicios as $value2)
                                @if($servicio->id==$value2->id)
                                @php($encontre=1)
                                @php($precio = $value2->pivot->precio)
                                @break
                                @endif
                                @endforeach
                                
                                @if($encontre==1)
								<div class="col-lg-6">
									<input type="checkbox" name="servicios[]" class="chk-col-red" id="{{$servicio->id}}"
										value="{{$servicio->id}}" checked>
									<label for="{{$servicio->id}}">{{$servicio->nombre}}</label>
								</div>

								<div class="col-lg-6">
                                
                                <input type="number" name="precios[]" id="precio-{{$servicio->id}}" class="form-control" value="{{$precio}}">

                                </div>

                                @else 

                                <div class="col-lg-6">
									<input type="checkbox" name="servicios[]" class="chk-col-red" id="{{$servicio->id}}"
										value="{{$servicio->id}}">
									<label for="{{$servicio->id}}">{{$servicio->nombre}}</label>
								</div>

								<div class="col-lg-6">
                                
                                <input type="number" name="precios[]" id="precio-{{$servicio->id}}" class="form-control">

                                </div>



                                
                                @endif
                               
								@endforeach
							</div>

						</div>




						<div class="row clearfix text-center">
							<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

								<button class="btn bg-light-blue waves-effect m-r-30" type="submit"><i
										class="material-icons">save</i>
									<span>ACTUALIZAR</span></button>

								<a href="{{route('cliente.index')}}" class="btn btn-danger waves-effect m-l-35">
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



