@extends('layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            <h1 class="m-0">Policarbonatos</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href=" {{ route('dashboard') }} ">Home</a></li>
                    <li class="breadcrumb-item active">Crear policarbonato</li>
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
                        <h5 class="card-title">Crear policarbonato</h5>
                        <br>
                        <!-- form start -->
                        <form role="form" action="{{ route('polycarbonates.store') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="color" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar solor">
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
                                    <label>Precio/m</label>
                                    <input name="price_per_meter" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar precio por metro">
                                    @if($errors->has('price_per_meter'))
                                        <span class="text-danger">{{ $errors->first('price_per_meter') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Tamaño</label>
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