@extends('layouts.app', ['activePage' => 'files', 'titlePage' => __('Mostrar')])

@section('content')
<!-- Dashboard Header -->
<div class="block-header">
    <div class="row remove-margin">
        <!-- Title -->
        <div class="col-md-4">
            <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
            <a href="{{ route('files.index') }}" class="header-title-link">
                <h1><i class="fas fa-file-contract animation-expandUp"></i>Archivos<br><small>Bienvenido {{ Auth::user()->name }}</small></h1>
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
    <li><i class="fas fa-file-contract"></i></li>
    <li><a href="{{ route('files.index') }}">Archivos</a></li>
    <li>Mostrar</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <div class="row gutter30">
            <!-- First Column -->
            <div class="col-md-8">
                <!-- Updates Block -->
                <div class="block">
                    <!-- Updates Title -->
                    <div class="block-title">
                        <h2><a href="{{ asset('storage') }}/{{ $file->file }}" target="_blank"><i class="fa fa-file-pdf-o"></a></i> {{ $file->name }}</h2>
                    </div>

                    <iframe width="100%" height="800" src="{{ asset('storage') }}/{{ $file->file }}" frameborder="0"></iframe>


                </div>
                <!-- END Updates Block -->
            </div>
            <!-- END First Column -->

            <!-- Second Column -->
            <div class="col-md-4">
                <div class="block">
                    <div class="block-title">
                        <h2><i class="fa fa-info-circle"></i> Info</h2>
                    </div>
                    <ul class="list-unstyled">
                        <li>
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Nombre</span></h6>
                            <p>{{ $file->name }}</p>
                        </li>
                        <li>
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Creado</span></h6>
                            <p>{{ $file->created_at->toFormattedDateString() }} ({{ $file->created_at->DiffForHumans()}})</p>
                        </li>
                        <li>
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Autor</span></h6>
                            <p>{{ $file->user->name }}</p>
                        </li>
                        <li>
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> email</span></h6>
                            <p>{{ $file->user->email }}</p>
                        </li>
                    </ul>
                </div>

                <div class="block">
                    <div class="block-title">
                        <h2><i class="fa fa-info-circle"></i> Acciones</h2>
                    </div>

                    <div class="list-group">
                        <a href="{{ route('files.presign', $file->id) }}" class="list-group-item">
                            <h4 class="list-group-item-heading">Firmar y enviar documento</h4>
                            <p class="list-group-item-text">Sólo yo firmo de forma electrónica, y envar el documento por correo.</p>
                        </a>
                        <a href="javascript:void(0)" class="list-group-item">
                            <h4 class="list-group-item-heading">Enviar invitación para firmar</h4>
                            <p class="list-group-item-text">Enviar invitación a alguien para ambos firmar el documento.</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- END Dashboard Content -->
@endsection
