@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Herrajes para vidrio</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
                    <li class="breadcrumb-item active">Crear herrajes para vidrio</li>
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
            <div class="col-lg-6">

                <div class="card card-primary card-outline">
                    <div class="card-body">
                        <h5 class="card-title">Crear herraje para vidrio</h5>
                        <br>
                        <!-- form start -->
                        <form role="form" 
                              action="{{ route('glass_fittings.store') }}" 
                              method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input name="name" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar nombre del perfil">
                                    @if($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Color</label>
                                    <input name="color" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar color">
                                    @if($errors->has('color'))
                                        <span class="text-danger">{{ $errors->first('color') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Tamaño</label>
                                    <input name="size" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar tamaño">
                                    @if($errors->has('size'))
                                        <span class="text-danger">{{ $errors->first('size') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>thickness</label>
                                    <input name="thickness" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar ">
                                    @if($errors->has('thickness'))
                                        <span class="text-danger">{{ $errors->first('thickness') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Precio/u</label>
                                    <input name="price" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar precio unitario">
                                    @if($errors->has('price'))
                                        <span class="text-danger">{{ $errors->first('price') }}</span>
                                    @endif
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" 
                                        class="btn btn-primary btn-sm">
                                        <i class="fa fa-save"></i> Crear
                                </button>
                            </div>
                        </form>
                    </div>
                </div><!-- /.card -->
            </div>
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection