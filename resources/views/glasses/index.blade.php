@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Vidrios</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
                    <li class="breadcrumb-item active">Lista de vidrios</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <div class="container-fluid">
                            <h5 class="card-title">Lista de vidrios</h5>
                            <br>
                            <br>

                            <a href="{{ route('glasses.create') }}" 
                               class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i>
                                Agregar vidrio
                            </a>
                            <br>
                            <br>
                        </div>

                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Color</th>
                                    <th>Medida</th>
                                    <th>thickness</th>
                                    <th>Precio/m</th>
                                    <th>Precio/u</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($glasses)
                                @foreach($glasses as $key => $glass)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $glass->color ?? 'Sin color' }}</td>
                                    <td>{{ $glass->size ?? 'Sin medida' }}</td>
                                    <td>{{ $glass->thickness ?? 'Sin ' }}</td>
                                    <td>{{ $glass->price_per_meter ?? 'Sin precio' }}</td>
                                    <td>{{ $glass->price ?? 'Sin precio' }}</td>
                                    <td>
                                        <a href="{{ route('glasses.edit', $glass->id) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                            Editar
                                        </a>

                                        <a href="javascript:;" 
                                           class="btn btn-sm btn-danger sa-delete" 
                                           data-form-id="glass-delete-{{ $glass->id }}">
                                            <i class="fa fa-trash"></i>
                                            Eliminar
                                        </a>

                                        <form id="glass-delete-{{ $glass->id }}" 
                                              action="{{ route('glasses.destroy', $glass->id) }}" 
                                              method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div><!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection