@extends('/base/base')

@section('content')

<div class="container">
    <div class="row">
        <div class="offset-9 col-3">
            <button type="button" class="btn btn-rounded  btn-outline-primary mb-3 " data-toggle="modal"
                data-target="#crearUsuario">Registrar Usuario
            </button>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card_title">Listado de usuarios</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Apellido </th>
                                    <th>Correo</th>
                                    <th>Editar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usu)
                                <tr>
                                    <td>{{ $usu->nombre }}</td>
                                    <td>{{ $usu->apellido }}</td>
                                    <td>{{ $usu->correo }}</td>
                                    <td>
                                        <button class="btn btn-rounded btn-fixed-w btn-outline-danger mb-3 btnEditar"
                                            href="#" value="{{ $usu->id }}">
                                            Editar
                                        </button>
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



<div class="modal fade bd-example-modal-sm" id="crearUsuario">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Registro de usuario</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            {!! Form::open(['url' => '#' , 'method' => 'post']) !!}

            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class=" form-group">
                                    {{ Form::label("nombre", 'Nombre', ['class' => 'col-form-label']) }}
                                    {!! Form::text('nombre', null, ['class' => 'form-control' ])!!}
                                    <div id="error_nombre" class="alert"></div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label("apellido", 'Apellido', ['class' => 'col-form-label']) }}
                                    {!! Form::text('apellido', null, ['class' => 'form-control' ])!!}
                                    <div id="error_apellido" class="alert"> </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label("correo", 'Correo', ['class' => 'col-form-label']) }}
                                    {!! Form::email('correo',null,['class' =>'form-control' ] ) !!}
                                    <div id="error_correo" class="alert"> </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label("clave", 'Clave', ['class' => 'col-form-label']) }}
                                    {!! Form::password('clave',['class' =>'form-control'] ) !!}
                                    <div id="error_clave" class="alert"> </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label("reclave", 'Repetir Clave', ['class' => 'col-form-label']) }}
                                    {!! Form::password('reclave',['class' =>'form-control'] ) !!}
                                    <div id="error_reclave" class="alert"> </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="btnGuardar">Registrar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


<button hidden class="btn btn-primary" id="btnCallModal" data-toggle="modal" data-target="#editarUsuario"></button>
<div class="modal fade bd-example-modal-sm" id="editarUsuario">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Actualizar usuario</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            {!! Form::open(['url' => '#' , 'method' => 'post']) !!}
            {!! Form::hidden('idusuarios', null, ['class' => 'form-control','id'=>'idusuarios' ])!!}
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class=" form-group">
                                    {{ Form::label("edit_nombre", 'Nombre', ['class' => 'col-form-label']) }}
                                    {!! Form::text('edit_nombre', null, ['class' => 'form-control' ])!!}
                                    <div id="error_edit_nombre" class="alert"></div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label("edit_apellido", 'Apellido', ['class' => 'col-form-label']) }}
                                    {!! Form::text('edit_apellido', null, ['class' => 'form-control' ])!!}
                                    <div id="error_edit_apellido" class="alert"> </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label("edit_correo", 'Correo', ['class' => 'col-form-label']) }}
                                    {!! Form::email('edit_correo',null,['class' =>'form-control' ] ) !!}
                                    <div id="error_edit_correo" class="alert"> </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label("edit_clave", 'Clave', ['class' => 'col-form-label']) }}
                                    {!! Form::password('edit_clave',['class' =>'form-control' ] ) !!}
                                    <div id="error_edit_clave" class="alert"> </div>
                                </div>

                                <div class="form-group">
                                    {{ Form::label("edit_reclave", 'Repetir Clave', ['class' => 'col-form-label']) }}
                                    {!! Form::password('edit_reclave',['class' =>'form-control' ] ) !!}
                                    <div id="error_edit_reclave" class="alert"> </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" id="btnEditar">Actualizar</button>
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
<script src="{{ asset('js/usuarios/index.js') }}"></script>
@endsection