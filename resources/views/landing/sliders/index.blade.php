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
    <li>Sliders</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <!-- Search Block -->
        <div class="clearfix">
            <div class="btn-group btn-group-sm pull-right push">
                <a href="{{ route('sliders.create') }}" class="btn btn-primary" id="style-hover"><i class="fas fa-plus"></i> Nuevo</a>
            </div>
            <div class="btn-group btn-group-sm pull-left push" data-toggle="buttons">
                <p>Sección principla de la página, donde se encuentran los Banners y los textos principales.</p>
            </div>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Banner</th>
                        <th>Título</th>
                        <th>Subtítulo</th>
                        <th>Párrafo</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sliders as $slider)
                    <tr>
                        <td style="max-width: 200px;"><a href="{{ route('sliders.show', $slider->id) }}"><img src="{{ asset('storage') }}/{{ $slider->banner }}" alt="" style="max-width: 100%;"></a></td>
                        <td style="vertical-align:middle;"><a href="{{ route('sliders.show', $slider->id) }}">{{ $slider->title }}</a></td>
                        <td style="vertical-align:middle;"><a href="{{ route('sliders.show', $slider->id) }}">{{ $slider->subtitle }}</a></td>
                        <td style="vertical-align:middle;"><a href="{{ route('sliders.show', $slider->id) }}">{{ $slider->paragraph}}</a></td>
                        <td class="text-center" style="vertical-align:middle;">
                            <div class="btn-group">
                                <a href="{{ route('sliders.edit', $slider->id) }}" class="btn btn-xs btn-default"><i class="fa fa-pencil-square-o"></i></a>
                                <form action="{{ route('sliders.destroy',$slider->id) }}" method="POST">
                                    @csrf

                                    @method('DELETE')
                                    <button type="submit" data-toggle="tooltip" title="Eliminar" class="btn btn-xs btn-default"><i class="fa fa-times"></i></button>
                                </form
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- END Dashboard Content -->
@endsection


