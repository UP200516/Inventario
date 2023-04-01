@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Herrajes para aluminio</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
                    <li class="breadcrumb-item active">Lista de herrajes para aluminio</li>
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
                            <h5 class="card-title">Lista de herrajes para aluminio</h5>
                            <br>
                            <br>

                            <a href="{{ route('glass_fittings.create') }}" 
                               class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i>
                                Agregar herraje para aluminio
                            </a>
                            <br>
                            <br>
                        </div>

                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Color</th>
                                    <th>Medida</th>
                                    <th>thickness</th>
                                    <th>Precio/u</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($glass_fittings)
                                @foreach($glass_fittings as $key => $glass_fitting)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $glass_fitting->name ?? 'Sin nombre' }}</td>
                                    <td>{{ $glass_fitting->color ?? 'Sin color' }}</td>
                                    <td>{{ $glass_fitting->size ?? 'Sin medida' }}</td>
                                    <td>{{ $glass_fitting->thickness ?? 'Sin ' }}</td>
                                    <td>{{ $glass_fitting->price ?? 'Sin precio' }}</td>
                                    <td>
                                        <a href="{{ route('glass_fittings.edit', $glass_fitting->id) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                            Editar
                                        </a>

                                        <a href="javascript:;" 
                                           class="btn btn-sm btn-danger sa-delete" 
                                           data-form-id="glass_fitting-delete-{{ $glass_fitting->id }}">
                                            <i class="fa fa-trash"></i>
                                            Eliminar
                                        </a>

                                        <form id="glass_fitting-delete-{{ $glass_fitting->id }}" 
                                              action="{{ route('glass_fittings.destroy', $glass_fitting->id) }}" 
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