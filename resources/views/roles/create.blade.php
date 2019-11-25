@extends('layouts.main')


@section('titulo', 'Registro de Roles')


@section('content')


<div class="container-fluid">
	@if ($errors->any())
	<div class="alert bg-red alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
				aria-hidden="true">×</span></button>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach

	</div>
	@endif

	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2 class="text-center">REGISTRO DE ROLES</h2>
				</div>


				<div class="body">
					<form class="form-horizontal" id="form_validation" method="POST"
						action="{{ route('roles.store') }}" autocomplete="off">

						@csrf

						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="name">Nombre del Rol: </label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control" id="name" name="name" required value={{old('name')}}>
									</div>
								</div>
							</div>
						</div>

						<hr>

						<h4 class="text-center font-italic col-teal">Lista de Permisos</h4>

						<hr>

						<div class="col-lg-12">


							<div class="demo-checkbox text-center">
                                @foreach ($permissions as $permission)
								<div class="col-lg-4">
                                <input type="checkbox" name="permission[]" class="chk-col-red" id="permission-{{$permission->id}}"
                                value="{{$permission->id}}">
									<label for="permission-{{$permission->id}}">{{$permission->name}}</label>
                                </div>
                                @endforeach
							</div>

						</div>


						<div class="row clearfix text-center">
							<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

								<button class="btn bg-light-blue waves-effect m-r-30" type="submit"><i
										class="material-icons">save</i>
									<span>GUARDAR</span></button>

								<a href="{{route('roles.index')}}" class="btn btn-danger waves-effect m-l-35">
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

<script src="{{URL::asset('plantilla/plugins/jquery-validation/jquery.validate.js')}}"></script>

<script src="{{URL::asset('plantilla/js/pages/forms/form-validation.js')}}"></script>

@stop