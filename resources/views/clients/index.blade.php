@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Clientes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
                    <li class="breadcrumb-item active">Lista de clientes</li>
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
                            <h5 class="card-title">Lista de clientes</h5>
                            <br>
                            <br>

                            <a href="{{ route('clients.create') }}" 
                               class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i>
                                Agregar cliente
                            </a>
                            <br>
                            <br>
                        </div>

                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
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
                                @if($clients)
                                @foreach($clients as $key => $client)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $client->full_name ?? 'Sin medida' }}</td>
                                    <td>{{ $client->address ?? 'Sin dirección' }}</td>
                                    <td>{{ $client->zip_code ?? 'Sin CP' }}</td>
                                    <td>{{ $client->city ?? 'Sin ciudad' }}</td>
                                    <td>{{ $client->state ?? 'Sin estado' }}</td>
                                    <td>{{ $client->rfc ?? 'Sin RFC' }}</td>
                                    <td>{{ $client->email ?? 'Sin correo electronico' }}</td>
                                    <td>{{ $client->phone ?? 'Sin telefono' }}</td>
                                    <td>
                                        <a href="{{ route('clients.edit', $client->id) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                            Editar
                                        </a>

                                        <a href="javascript:;" 
                                           class="btn btn-sm btn-danger sa-delete" 
                                           data-form-id="client-delete-{{ $client->id }}">
                                            <i class="fa fa-trash"></i>
                                            Eliminar
                                        </a>

                                        <form id="client-delete-{{ $client->id }}" 
                                              action="{{ route('clients.destroy', $client->id) }}" 
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