@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Productos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
                    <li class="breadcrumb-item active">Lista de productos</li>
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
                            <h5 class="card-title">Lista de productos</h5>
                            <br>
                            <br>
                            <a href="{{ route('products.create') }}" 
                               class="btn btn-sm btn-primary">
                                <i class="fa fa-plus"></i>
                                Agregar producto
                            </a>
                            <br>
                            <br>
                        </div>
                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($products)
                                @foreach($products as $key => $product)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $product->name ?? 'Sin nombre' }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->id) }}" 
                                           class="btn btn-sm btn-info">
                                           <i class="fa fa-edit"></i>
                                            Editar
                                        </a>

                                        <a href="javascript:;" 
                                           class="btn btn-sm btn-danger sa-delete" 
                                           data-form-id="product-delete-{{ $product->id }}">
                                            <i class="fa fa-trash"></i>
                                            Eliminar
                                        </a>

                                        <form id="product-delete-{{ $product->id }}" 
                                              action="{{ route('products.destroy', $product->id) }}" 
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