@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Felpas</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
                    <li class="breadcrumb-item active">Lista de felpas</li>
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
                            <h5 class="card-title">Lista de felpas</h5>
                            <br>
                            <br>

                            <a href="{{ route('plushes.create') }}" 
                               class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i>
                                Agregar felpa
                            </a>
                            <br>
                            <br>
                        </div>

                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Color</th>
                                    <th>Tipo</th>
                                    <th>Precio/k</th>
                                    <th>Precio/u</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($plushes)
                                @foreach($plushes as $key => $plush)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $plush->color ?? 'Sin color' }}</td>
                                    <td>{{ $plush->type ?? 'Sin tipo' }}</td>
                                    <td>{{ $plush->price_per_kilo ?? 'Sin precio' }}</td>
                                    <td>{{ $plush->price ?? 'Sin precio' }}</td>
                                    <td>
                                        <a href="{{ route('plushes.edit', $plush->id) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                            Editar
                                        </a>

                                        <a href="javascript:;" 
                                           class="btn btn-sm btn-danger sa-delete" 
                                           data-form-id="plush-delete-{{ $plush->id }}">
                                            <i class="fa fa-trash"></i>
                                            Eliminar
                                        </a>

                                        <form id="plush-delete-{{ $plush->id }}" 
                                              action="{{ route('plushes.destroy', $plush->id) }}" 
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