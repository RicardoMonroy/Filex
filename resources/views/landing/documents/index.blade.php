@extends('layouts.app', ['activePage' => 'documents', 'titlePage' => __('Documentos')])

@section('content')
<!-- Dashboard Header -->
<div class="block-header">
    <div class="row remove-margin">
        <!-- Title -->
        <div class="col-md-4">
            <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
            <a href="" class="header-title-link">
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
    <li>Tipos de Documentos</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <!-- Search Block -->
        <div class="clearfix">
            <div class="btn-group btn-group-sm pull-right push">
                <a href="{{ route('document.create') }}" class="btn btn-primary" id="style-hover"><i class="fas fa-plus"></i> Nuevo</a>
            </div>
            <div class="btn-group btn-group-sm pull-left push" data-toggle="buttons">
                <p>Listado de los tipos de documentos que podrían firmarse mediante la plataforma</p>
            </div>
        </div>
        <div class="table-responsive">
            <table id="example-datatable" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">Documento</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($documents as $document)
                    <tr>
                        <td class="text-center">{{ $document->name }}</td>
                        <td class="text-center">
                            <div class="btn-group">
                                <form action="{{ route('document.destroy',$document->id) }}" method="POST">
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


