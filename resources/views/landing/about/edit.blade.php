@extends('layouts.app', ['activePage' => 'about', 'titlePage' => __('Nosotros')])

@section('content')
<!-- Dashboard Header -->
<div class="block-header">
    <div class="row remove-margin">
        <!-- Title -->
        <div class="col-md-4">
            <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
            <a href="" class="header-title-link">
                <h1><i class="fa fa-paper-plane animation-expandUp"></i>Sobre nosotros<br><small>Bienvenido {{ Auth::user()->name }}</small></h1>
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
    <li><a href="{{ route('about.index') }}">Nosotros</a></li>
    <li>Editar</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <!-- First Column -->
        <form action="{{ route('about.update', $about->id) }}" method="post" enctype="multipart/form-data" class="form-horizontal">
        @csrf
        @method('PUT')

        <div class="col-md-8">

            <div class="block">
                <div class="block-title clearfix">
                    <h2 class="pull-left">Datos</h2>
                </div>

                <h4 class="sub-header">Textos informativos</h4>


                <div class="form-group">
                    <label class="col-md-2 control-label" for="title">Título</label>
                    <div class="col-md-9">
                        <input type="text" id="title" name="title" class="form-control" value="{{ $about->title }}">
                        <span class="help-block">Éste es el título que aparece en la sección de nosotros</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="subtitleLeft">Subtítulo</label>
                    <div class="col-md-3">
                        <input type="text" id="subtitleLeft" name="subtitleLeft" class="form-control" value="{{ $about->subtitleLeft }}">
                        <span class="help-block">La parte izquierda del subtítulo</span>
                    </div>
                    <div class="col-md-3">
                        <select id="" name="" class="form-control" size="1">
                            @foreach ($documents as $document)
                                <option value="{{ $document->name }}">{{ $document->name }}</option>
                            @endforeach
                        </select>
                        <span class="help-block">Todos los documentos que apareceran (para añadir ir dar click <a href="{{ route('document.index') }}" >aquí</a>)</span>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="subtitleRight" name="subtitleRight" class="form-control" value="{{ $about->subtitleRight }}">
                        <span class="help-block">La parte derecha del subtítulo</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-2 control-label" for="paragraph">Párrafo</label>
                    <div class="col-md-9">
                        <textarea id="paragraph" name="paragraph" rows="4" class="form-control" placeholder="">{{ $about->paragraph }}</textarea>
                        <span class="help-block">El párafo, aquí va una gran descripción</span>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-2">
                        {{-- <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button> --}}
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Actualizar</button>
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
                    <h2><i class="fa fa-paper-plane"></a></i> Portada</h2>
                </div>
                <h4 class="sub-header">Imágen</h4>

                <img width="100%" src="{{ asset('storage') }}/{{ $about->picture }}">
                <h4 class="sub-header">Actualizar imágen </h4> <h5>Se recomienda uma iágen de 765 x 554</h5>
                <div class="form-group">
                    <label class="col-md-2 control-label" for="picture">File input</label>
                    <div class="col-md-5">
                        <input type="file" id="picture" name="picture">
                    </div>
                </div>
                <br><br>
                <h4 class="sub-header"> </h4>


            </div>
            <!-- END Updates Block -->
        </div>
        </form>
        <!-- END Second Column -->
    </div>
</div>
<!-- END Dashboard Content -->
@endsection
