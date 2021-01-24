@extends('layouts.app', ['activePage' => 'slider', 'titlePage' => __('Sliders')])

@section('content')
<!-- Dashboard Header -->
<div class="block-header">
    <div class="row remove-margin">
        <!-- Title -->
        <div class="col-md-4">
            <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
            <a href="" class="header-title-link">
                <h1><i class="fa fa-paper-plane animation-expandUp"></i>Sliders<br><small>Bienvenido {{ Auth::user()->name }}</small></h1>
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
    <li><a href="{{ route('sliders.index') }}">Sliders</a></li>
    <li>Editar</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <!-- First Column -->
        <div class="col-md-6">

            <div class="block">
                <div class="block-title clearfix">
                    <div class="block-options pull-right">
                        <div class="btn-group btn-group-md">
                            <form action="{{ route('sliders.destroy',$slider->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-toggle="tooltip" title="Eliminar" class="btn btn-primary" data-original-title="Eliminar"><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="block-options pull-right">
                        <div class="btn-group btn-group-md">
                            <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-primary" data-toggle="tooltip" title="" data-original-title="Editar"><i class="fa fa-pencil-square-o"></i></a>
                        </div>
                    </div> --}}
                    <h2 class="pull-left">Datos</h2>
                </div>
                <form action="{{ route('sliders.update', $slider->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                <h4 class="sub-header">Textos informativos</h4>


                <div class="form-group">
                    <label class="col-md-2 control-label" for="title">Título</label>
                    <div class="col-md-10">
                        <input type="text" id="title" name="title" class="form-control" value="{{ $slider->title }}">
                        <span class="help-block">Éste es el título que aparece en el banner</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="subtitle">Subtítulo</label>
                    <div class="col-md-10">
                        <input type="text" id="subtitle" name="subtitle" class="form-control" value="{{ $slider->subtitle }}">
                        <span class="help-block">Éste es el subtítulo que aparece en el banner</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="paragraph">Párrafo</label>
                    <div class="col-md-10">
                        <textarea id="paragraph" name="paragraph" rows="4" class="form-control" placeholder="">{{ $slider->paragraph }}</textarea>
                        <span class="help-block">El párafo, aquí va una gran descripción</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="margin">Margen</label>
                    <div class="col-md-10">
                    <select id="margin" name="margin" class="form-control" size="1">
                    <option value="{{ $slider->margin }}">Valor actual: "{{ $slider->margin }}"</option>
                    <option value="center">Centrado</option>
                    <option value="left">Izquierda</option>
                    <option value="right">Derecha</option>
                    </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-10 col-sm-offset-2">
                        {{-- <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button> --}}
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Actualizar</button>
                    </div>
                </div>


            </div>
            <!-- END Twitter Block -->
        </div>

        <!-- END First Column -->

        <!-- Second Column -->
        <div class="col-md-6">
            <!-- Updates Block -->
            <div class="block">
                <!-- Updates Title -->
                <div class="block-title">
                    <h2><i class="fa fa-paper-plane"></a></i> Portada</h2>
                </div>
                <h4 class="sub-header">Banner de fondo</h4>

                <img width="100%" src="{{ asset('storage') }}/{{ $slider->banner }}">
                <h4 class="sub-header">Actualizar imágen </h4> <h5>Se recomienda uma iágen de 1920 x 1080</h5>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="banner">File input</label>
                    <div class="col-md-5">
                        <input type="file" id="banner" name="banner">
                    </div>
                </div>
                <br><br>
                <h4 class="sub-header"> </h4>
                </form>

            </div>
            <!-- END Updates Block -->
        </div>

        <!-- END Second Column -->
    </div>
</div>
<!-- END Dashboard Content -->
@endsection
