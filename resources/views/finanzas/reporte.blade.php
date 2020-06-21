@extends('base.base')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            {!! Form::open(['url' => '#' , 'method' => 'post']) !!}
            <div class="row">
                <div class="col-md-5 col-xs-12">
                    <div class=" form-group">
                        {{ Form::label("desde", 'Desde', ['class' => 'col-form-label']) }}
                        {!! Form::date('desde', null, ['class' => 'form-control', 'id'=>'desde' ])
                        !!}
                        <div id="error_desde" class="alert"></div>
                    </div>
                </div>
                <div class="col-md-5 col-xs-12">
                    <div class=" form-group">
                        {{ Form::label("hasta", 'Hasta', ['class' => 'col-form-label']) }}
                        {!! Form::date('hasta', null, ['class' => 'form-control', 'id'=>'hasta' ])
                        !!}
                        <div id="error_hasta" class="alert"></div>
                    </div>
                </div>

                <div class="col-md-2 col-xs-12">
                    <div style="display: flex;  align-items: center;  justify-content: center;  min-height: 13vh;">
                        <div class=" form-group">
                            <button class="btn btn-primary" name="btnBuscar" id="btnBuscar">Buscar</button>
                        </div>
                    </div>
                </div>
            </div>

            {!! Form::close() !!}

            <div class="row" style="display:none" id="Tabla_resultado">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card_title">Resumen de Ingresos y Egresos</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped" id="dataTable" width="100%"
                                        cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th> - </th>
                                                <th>Cantidad Ingreso</th>
                                                <th>Total Ingreso</th>
                                                <th>Cantidad Egreso</th>
                                                <th>Total Egreso</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Vigente</td>
                                                <td id="v_cant_ingre">0</td>
                                                <td id="v_tot_ingre">0</td>
                                                <td id="v_cant_egre">0</td>
                                                <td id="v_tot_egre">0</td>
                                            </tr>
                                            <tr>
                                                <td>Anulado</td>
                                                <td id="a_cant_ingre">0</td>
                                                <td id="a_tot_ingre">0</td>
                                                <td id="a_cant_egre">0</td>
                                                <td id="a_tot_egre">0</td>
                                            </tr>
                                            <tr>
                                                <td>Total</td>
                                                <td id="t_cant_ingre">0</td>
                                                <td id="t_tot_ingre"> - </td>
                                                <td id="t_cant_egre">0</td>
                                                <td id="t_tot_egre"> - </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section("js")
<script src="{{ asset('vendors/data-table/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('vendors/data-table/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendors/data-table/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('vendors/data-table/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('vendors/data-table/js/responsive.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/finanzas/reporte.js') }}"></script>
@endsection