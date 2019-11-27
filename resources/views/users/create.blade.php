@extends('layouts.main')


@section('titulo', 'Registro de Usuarios')

@section('extra-css')
<link href="{{URL::asset('plantilla/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet">
@stop


@section('content')

<div class="container-fluid">

	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">
				<div class="header">
					<h2 class="text-center">REGISTRO DE USUARIOS</h2>
				</div>

				<div class="body">

					<form class="form-horizontal" id="form_validation" method="POST"
						action="{{ route('users.store') }}" autocomplete="off">

						@csrf

						<div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="name">Nombre</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="text" class="form-control" id="name" name="name">
									</div>
								</div>
							</div>
                        </div>
                        
                        <div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="email">Email</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="email" class="form-control" id="email" name="email">
									</div>
								</div>
							</div>
						</div>

                        
                        <div class="row clearfix">
							<div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
								<label for="password">Password</label>
							</div>
							<div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
								<div class="form-group">
									<div class="form-line">
										<input type="password" class="form-control" id="password" name="password">
									</div>
								</div>
							</div>
            </div>

            <div class="row clearfix">
                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                  <label for="confirm-password">Confirmar Password</label>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                  <div class="form-group">
                    <div class="form-line">
                      <input type="password" class="form-control" id="confirm-password" name="confirm-password">
                    </div>
                  </div>
                </div>
              </div>

              <div class="row clearfix">
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                    <label for="categoria_id">Escoger Roles</label>
                  </div>
                  <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                    <div class="form-group">
                      <div class="form-line">
                        <select class="form-control show-tick" multiple="multiple" data-live-search="true" name="roles[]" id="roles">
                          <option value="">Escoger</option>	
                          @foreach($roles as $rol)
                          <option value='{{$rol->name}}'>{{$rol->name}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
              </div>
    


                        
                 

						<div class="row clearfix text-center">
							<div class="col-lg-offset-2 col-md-offset-2 col-sm-offset-4 col-xs-offset-5">

								<button class="btn bg-light-blue waves-effect m-r-30" type="submit"><i
										class="material-icons">save</i>
									<span>GUARDAR</span></button>

								<a href="{{route('users.index')}}" class="btn btn-danger waves-effect m-l-35">
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



