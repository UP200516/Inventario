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
                    <li class="breadcrumb-item active">Crear Proveedor</li>
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
                        <h5 class="card-title">Crear proveedor</h5>
                        <br>
                        <!-- form start -->
                        <form role="form" 
                              action="{{ route('providers.store') }}" 
                              method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Empresa:</label>
                                    <input name="name" type="text" class="form-control" placeholder="Ingresar nombre del director completo">
                                    @if($errors->has('name'))
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Nombre director:</label>
                                    <input name="manager_name" type="text" class="form-control" placeholder="Ingresar nombre del director completo">
                                    @if($errors->has('manager_name'))
                                    <span class="text-danger">{{ $errors->first('manager_name') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Dirección:</label>
                                    <input name="address" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar dirección">
                                    @if($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>CP:</label>
                                    <input name="zip_code" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar código postal">
                                    @if($errors->has('zip_code'))
                                        <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Ciudad:</label>
                                    <input name="city" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar ciudad">
                                    @if($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Estado:</label>
                                    <input name="state" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar estado">
                                    @if($errors->has('state'))
                                        <span class="text-danger">{{ $errors->first('state') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>RFC:</label>
                                    <input name="rfc" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar RFC">
                                    @if($errors->has('rfc'))
                                        <span class="text-danger">{{ $errors->first('rfc') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Correo electronico:</label>
                                    <input name="email" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar correo electronico">
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Número de Teléfono:</label>
                                    <input name="phone" 
                                           type="text" 
                                           class="form-control" 
                                           placeholder="Ingresar número de teléfono">
                                    @if($errors->has('phone'))
                                        <span class="text-danger">{{ $errors->first('phone') }}</span>
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