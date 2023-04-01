@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Proveedores</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
                    <li class="breadcrumb-item active">Lista de proveedores</li>
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
                            <h5 class="card-title">Lista de proveedores</h5>
                            <br>
                            <br>

                            <a href="{{ route('providers.create') }}" 
                               class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i>
                                Agregar proveedor
                            </a>
                            <br>
                            <br>
                        </div>

                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Empresa</th>
                                    <th>Nombre del director</th>
                                    <th>Dirección</th>
                                    <th>CP</th>
                                    <th>Ciudad</th>
                                    <th>Estado</th>
                                    <th>RFC</th>
                                    <th>Correo electronico</th>
                                    <th>Teléfono</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($providers)
                                @foreach($providers as $key => $provider)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $provider->name ?? 'Sin medida' }}</td>
                                    <td>{{ $provider->manager_name ?? 'Sin medida' }}</td>
                                    <td>{{ $provider->address ?? 'Sin dirección' }}</td>
                                    <td>{{ $provider->zip_code ?? 'Sin CP' }}</td>
                                    <td>{{ $provider->city ?? 'Sin ciudad' }}</td>
                                    <td>{{ $provider->state ?? 'Sin estado' }}</td>
                                    <td>{{ $provider->rfc ?? 'Sin RFC' }}</td>
                                    <td>{{ $provider->email ?? 'Sin correo electronico' }}</td>
                                    <td>{{ $provider->phone ?? 'Sin telefono' }}</td>
                                    <td>
                                        <a href="{{ route('providers.edit', $provider->id) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                            Editar
                                        </a>

                                        <a href="javascript:;" 
                                           class="btn btn-sm btn-danger sa-delete" 
                                           data-form-id="provider-delete-{{ $provider->id }}">
                                            <i class="fa fa-trash"></i>
                                            Eliminar
                                        </a>

                                        <form id="provider-delete-{{ $provider->id }}" 
                                              action="{{ route('providers.destroy', $provider->id) }}" 
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