@extends('base.base')

@section('content')
<div class="container">
    <div class="row">
        <div class="offset-9 col-3">
            <button type="button" class="btn btn-rounded  btn-outline-primary mb-3 " data-toggle="modal"
                data-target=".bd-example-modal-sm">Registrar Ingreso
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card_title">Listado de ingresos</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Monto</th>
                                    <th>Comentario</th>
                                    <th>Fecha</th>
                                    <th>Anulado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($listado as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->monto }}</td>
                                    <td>{{ $item->comentario }}</td>
                                    <td>{{ $item->fecha_ingreso }}</td>
                                    @if($item->anulado == 1)
                                    <td>Si</td>
                                    @else
                                    <td>
                                        <button type="button" value="{{ $item->id }}"
                                            class="btn btn-rounded btn-fixed-w btn-outline-danger mb-3 btn-anular">
                                            Anular
                                        </button>
                                    </td>
                                    @endif
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



<div class="modal fade bd-example-modal-sm">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registro de ingresos</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            {!! Form::open(['url' => 'registrarIngreso' , 'method' => 'post']) !!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class=" form-group">
                                    {{ Form::label("comentario", 'Comentario', ['class' => 'col-form-label']) }}
                                    {!! Form::text('comentario', null, ['class' => 'form-control' ])
                                    !!}
                                    <div id="error_comentario" class="alert"></div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label("monto", 'Monto', ['class' => 'col-form-label']) }}
                                    {!! Form::number('monto', null, ['class' => 'form-control' ])
                                    !!}
                                    <div id="error_monto" class="alert"> </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label("fecha_ingreso", 'Fecha Ingreso', ['class' => 'col-form-label']) }}
                                    {!! Form::date('fecha_ingreso',\Carbon\Carbon::now(),['class' =>
                                    'form-control' ] ) !!}
                                    <div id="error_fecha_ingreso" class="alert"> </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="registrarIngreso">Registrar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
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
<script src="{{ asset('js/finanzas/ingreso.js') }}"></script>
@endsection