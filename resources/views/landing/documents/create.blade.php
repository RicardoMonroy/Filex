@extends('layouts.app', ['activePage' => 'documents', 'titlePage' => __('Documents')])

@section('content')
<!-- Dashboard Header -->
<div class="block-header">
    <div class="row remove-margin">
        <!-- Title -->
        <div class="col-md-4">
            <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
            <a href="{{ route('document.index') }}" class="header-title-link">
                <h1><i class="fa fa-paper-plane animation-expandUp"></i>Documentos<br><small>Bienvenido {{ Auth::user()->name }}</small></h1>
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
    <li><a href="{{ route('about.edit', 1) }}"">Nosotros</a></li>
    <li><a href="{{ route('document.index') }}">Documentos</a></li>
    <li>Nuevo</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <!-- First Column -->
        <div class="col-md-12">
            <div class="block">
                <div class="block-title clearfix">
                    {{-- <div class="block-options pull-right">
                        <div class="btn-group btn-group-md">
                            <form action="{{ route('sliders.destroy',$slider->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-toggle="tooltip" title="Eliminar" class="btn btn-primary" data-original-title="Eliminar"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div> --}}
                    {{-- <div class="block-options pull-right">
                        <div class="btn-group btn-group-md">
                            <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-primary" data-toggle="tooltip" title="" data-original-title="Editar"><i class="fa fa-pencil-square-o"></i></a>
                        </div>
                    </div> --}}
                    <h2 class="pull-left">Datos</h2>
                </div>
                <form action="{{ route('document.store') }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                <h4 class="sub-header">En esta sección se creaen los tipos de documentos que apareceran en la sección de "Nosotros" en la landingpage.</h4>


                <div class="form-group">
                    <label class="col-md-2 control-label" for="name">Nombre del documento</label>
                    <div class="col-md-10">
                        <input type="text" id="name" name="name" class="form-control" >
                        <span class="help-block">Nombre del tipo de documento</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        {{-- <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button> --}}
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Guardar</button>
                    </div>
                </div>


            </div>
            <!-- END Twitter Block -->
        </div>
    </div>
</div>
<!-- END Dashboard Content -->
@endsection
