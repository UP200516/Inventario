@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Perfiles de aluminio</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
                    <li class="breadcrumb-item active">Lista de perfiles de aluminio</li>
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
                            <h5 class="card-title">Lista de perfiles de aluminio</h5>
                            <br>
                            <br>

                            <a href="{{ route('aluminum_profiles.create') }}" 
                               class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i>
                                Agregar perfil
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
                                    <th>Precio/m</th>
                                    <th>Precio/u</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($aluminum_profiles)
                                @foreach($aluminum_profiles as $key => $aluminum_profile)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $aluminum_profile->name ?? 'Sin nombre' }}</td>
                                    <td>{{ $aluminum_profile->color ?? 'Sin color' }}</td>
                                    <td>{{ $aluminum_profile->size ?? 'Sin medida' }}</td>
                                    <td>{{ $aluminum_profile->thickness ?? 'Sin ' }}</td>
                                    <td>{{ $aluminum_profile->price_per_meter ?? 'Sin precio' }}</td>
                                    <td>{{ $aluminum_profile->price ?? 'Sin precio' }}</td>
                                    <td>
                                        <a href="{{ route('aluminum_profiles.edit', $aluminum_profile->id) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="fa fa-edit"></i>
                                            Editar
                                        </a>

                                        <a href="javascript:;" 
                                           class="btn btn-sm btn-danger sa-delete" 
                                           data-form-id="aluminum_profile-delete-{{ $aluminum_profile->id }}">
                                            <i class="fa fa-trash"></i>
                                            Eliminar
                                        </a>

                                        <form id="aluminum_profile-delete-{{ $aluminum_profile->id }}" 
                                              action="{{ route('aluminum_profiles.destroy', $aluminum_profile->id) }}" 
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