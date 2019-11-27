<div class="modal fade" id="listaEmpleados" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">

                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    LISTADO DE EMPLEADOS
                                </h2>
                            </div>
                            <div class="body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="tabla_actividades">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th class="text-center">Empleado</th>
                                                <th class="text-center">Escoger</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($empleados as $empleado)
                                            <tr>
                                                <td class="text-center">{{ $empleado->id }}</td>
                                                <td class="text-center">{{ $empleado->nombres }}</td>
                                                <td class="text-center">
                                                    <a href="#" data-dismiss="modal" class="btn bg-light-blue btn-sm">Escoger</a>   
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
            <div class="modal-footer">
                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CERRAR</button>
            </div>
        </div>
    </div>
</div>
