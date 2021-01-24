@extends('layouts.app', ['activePage' => 'contracts', 'titlePage' => __('Nuevo')])

@section('content')
<!-- Dashboard Header -->
<div class="block-header">
    <div class="row remove-margin">
        <!-- Title -->
        <div class="col-md-4">
            <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
            <a href="{{ route('contracts.index') }}" class="header-title-link">
                <h1><i class="fas fa-file-contract animation-expandUp"></i>Contratos<br><small>Bienvenido {{ Auth::user()->name }}</small></h1>
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
    <li><a href="{{ route('contracts.index') }}">Contratos</a></li>
    <li>Nuevo</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <form action="{{ route('contracts.confirm') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
        @csrf
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-sm-4 control-label" for="bordered-username">Nombre del Evento</label>
            <div class="col-sm-8">
                <input type="text" id="name" name="name" class="form-control" placeholder="Ej. Firma de compraventa">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-4 control-label" for="bordered-username">Correo del invitado</label>
            <div class="col-sm-8">
                <input type="email" id="email" name="email" class="form-control" placeholder="Ej. usuario@ejemplo.com">
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-4 control-label" for="example-select">Archivo</label>
            <div class="col-md-8">
                <select id="file" name="file" class="form-control" size="1">
                    @if ($doc ?? '' != NULL)
                        <option value="{{ $doc->id }}">{{ $doc->name }}</option>
                    @else
                    <option value="0">Selecciona un Archivo</option>
                        @foreach ($files as $file)
                            <option value="{{ $file->id }}">{{ $file->name }}</option>
                        @endforeach
                    @endif

                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10 col-sm-offset-2">
                <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Seguir</button>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label class="col-sm-4 control-label" for="bordered-username">Si desea agregár más invitados:</label>
            <div class="col-sm-8">
                <a class="btn btn-sm btn-primary" href="#" onclick="AgregarCampos();">Agregar destinatario</a>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-12">
                <div id="campos">
            </div>
        </div>
    </div>
    </form>
</div>
@endsection

@push('js')
<script type="text/javascript">
    var nextinput = 0;
    function AgregarCampos(){
    nextinput++;
    // campo = '<li id="rut'+nextinput+'">Correo:<input type="text" size="20" id="campo' + nextinput + '"&nbsp; name="campo' + nextinput + '"&nbsp; /></li>';
    if(nextinput < 4){
        campo = '<input type="email" id="email' + nextinput + '"&nbsp; name="email' + nextinput + '" class="form-control" placeholder="Ej. usuario@ejemplo.com" /><br>';
    $("#campos").append(campo);
    }
    }
    </script>
@endpush
