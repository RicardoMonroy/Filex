@extends('layouts.app', ['activePage' => 'contact', 'titlePage' => __('Contacto')])

@section('content')
<!-- Dashboard Header -->
<div class="block-header">
    <div class="row remove-margin">
        <!-- Title -->
        <div class="col-md-4">
            <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
            <a href="" class="header-title-link">
                <h1><i class="fa fa-paper-plane animation-expandUp"></i>Contacto<br><small>Bienvenido {{ Auth::user()->name }}</small></h1>
            </a>
        </div>
        <!-- END Title -->

        <!-- Statistics -->
        <div class="col-md-8">
            <!-- Outer Grid -->
            <div class="row">
                <div class="col-sm-6">
                    <!-- Inner Grid 1 -->
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="{{ route('files.index') }}" class="header-link">
                                <h1 class="animation-pullDown">
                                    <strong>{{ $files->count() }}</strong><br><small>Archivos</small>
                                </h1>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a href="{{ route('contracts.index') }}" class="header-link">
                                <h1 class="animation-pullDown">
                                    <strong>{{ $contracts->count() }}</strong><br><small>Contratos</small>
                                </h1>
                            </a>
                        </div>
                    </div>
                    <!-- END Inner Grid 1 -->
                </div>
                <div class="col-sm-6">
                    <!-- Inner Grid 2 -->
                    <div class="row">
                        {{-- <div class="col-xs-6">
                            <a href="page_special_timeline.html" class="header-link">
                                <h1 class="animation-pullDown">
                                    <strong>7</strong><br><small>Updates</small>
                                </h1>
                            </a>
                        </div> --}}
                        {{-- <div class="col-xs-6">
                            <a href="page_special_message_center.html" class="header-link">
                                <h1 class="animation-pullDown">
                                    <strong>5</strong><br><small>Messages</small>
                                </h1>
                            </a>
                        </div> --}}
                    </div>
                    <!-- END Inner Grid 2 -->
                </div>
            </div>
            <!-- END Outer Grid  -->
        </div>
        <!-- END Statistics -->
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><i class="fa fa-paper-plane"></i></li>
    <li>Landigpage</li>
    <li><a href="{{ route('contact.edit', 1) }}">Contacto</a></li>
    <li>Editar</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <!-- First Column -->
        <form action="{{ route('contact.update', $contact->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        @method('PUT')

        <div class="col-md-8">

            <div class="block">
                <div class="block-title clearfix">
                    <h2 class="pull-left">Datos</h2>
                </div>

                <h4 class="sub-header">Datos informativos</h4>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="address">Dirección</label>
                    <div class="col-md-9">
                        <input type="text" id="address" name="address" class="form-control" value="{{ $contact->address }}">
                        <span class="help-block">Dirección fiscal</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="addressPhone">Teléfono Oficina</label>
                    <div class="col-md-9">
                        <input type="text" id="addressPhone" name="addressPhone" class="form-control" value="{{ $contact->addressPhone }}">
                        <span class="help-block">Teléfono de oficina</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="addressMovil">Teléfono Movil</label>
                    <div class="col-md-9">
                        <input type="text" id="addressMovil" name="addressMovil" class="form-control" value="{{ $contact->addressMovil }}">
                        <span class="help-block">Teléfono movil</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="emailSupport">Email Soporte</label>
                    <div class="col-md-9">
                        <input type="text" id="emailSupport" name="emailSupport" class="form-control" value="{{ $contact->emailSupport }}">
                        <span class="help-block">Dirección de correo electrónico para soporte técnico</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="emailSales">Email Ventas</label>
                    <div class="col-md-9">
                        <input type="text" id="emailSales" name="emailSales" class="form-control" value="{{ $contact->emailSales }}">
                        <span class="help-block">Dirección de correo electrónico para ventas</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="emailContact">Email Contacto</label>
                    <div class="col-md-9">
                        <input type="text" id="emailContact" name="emailContact" class="form-control" value="{{ $contact->emailContact }}">
                        <span class="help-block">Dirección de correo electrónico para contacto, <strong>en ésta dirección llegarán los mensajes del formulario web</strong></span>
                    </div>
                </div>
            </div>
            <!-- END Twitter Block -->
        </div>

        <!-- END First Column -->

        <!-- Second Column -->
        <div class="col-md-4">
            <!-- Updates Block -->
            <div class="block">
                <!-- Updates Title -->
                <div class="block-title">
                    <h2> Titulo</h2>
                </div>
                <h4 class="sub-header">Información</h4>

                <div class="form-group">
                    {{-- <label class="col-md-2 control-label" for="paragraph">Infoemación</label> --}}
                    <div class="col-md-12">
                        <textarea id="paragraph" name="paragraph" rows="5" class="form-control" placeholder="">{{ $contact->paragraph }}</textarea>
                        <span class="help-block">Aquí va una gran descripción</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-2">
                        {{-- <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button> --}}
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Actualizar</button>
                    </div>
                </div>


            </div>
            <!-- END Updates Block -->
        </div>
        </form>
        <!-- END Second Column -->
    </div>
</div>
<!-- END Dashboard Content -->
@endsection
