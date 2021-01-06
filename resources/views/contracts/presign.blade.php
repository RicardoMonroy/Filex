@extends('layouts.app', ['activePage' => 'contracts', 'titlePage' => __('Confirmar')])

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
    <li>Firmar</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <form action="{{ route('contracts.sign') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
            @csrf
            <!-- Info Column -->
            <div class="col-md-6">


                <!-- Twitter Block -->
                <div class="block">
                    <!-- Twitter Title -->
                    <div class="block-title">
                        <h2><i class="fa fa-info-circle"></i> Info</h2>
                    </div>
                    <!-- END Twitter Title -->

                    <!-- Twitter Content -->
                    <ul class="list-unstyled">
                        <li>
                            <input type="hidden" id="contractId" name="contractId" value="{{ $contract->id }}">
                            <input type="hidden" id="contractName" name="contractName" value="{{ $contract->name }}">
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="cerFile">Archivo .cer</label>
                                <div class="col-md-5">
                                <input type="file" id="cerFile" name="cerFile">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="pemKeyFile">Archivo .key</label>
                                <div class="col-md-5">
                                <input type="file" id="pemKeyFile" name="pemKeyFile">
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="form-group">
                                <label class="col-md-2 control-label" for="passPhrase">Password</label>
                                <div class="col-md-10">
                                <input type="password" id="passPhrase" name="passPhrase" class="form-control" placeholder="Password">
                                <span class="help-block">Introduce tu contraseña para abrir la llave primaria</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- END Twitter Content -->
                </div>
                <!-- END Twitter Block -->
            </div>
            <!-- END Info Column -->

            <!-- File Column -->
            <div class="col-md-6">
                <!-- Updates Block -->
                <div class="block">
                    <!-- Updates Title -->
                    <div class="block-title">
                        <h2><i class="fa fa-file-pdf-o"></i> {{ $contract->file->name }}</h2>
                    </div>
                    {{-- <input type="file" name="file" id="file"> --}}
                    <input type="hidden" name="file" id="file" value="{{ $contract->file->file }}">
                    <iframe width="100%" height="500" src="{{ asset('storage') }}/{{ $contract->file->file }}" frameborder="0"></iframe>


                </div>
                <!-- END Updates Block -->
            </div>
            <!-- END File Column -->


            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Firmar</button>
                </div>
            </div>
        </form>


    </div>
</div>
<!-- END Dashboard Content -->
@endsection

