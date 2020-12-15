@extends('layouts.app', ['activePage' => 'files', 'titlePage' => __('Nuevo')])

@section('content')
<!-- Dashboard Header -->
<div class="block-header">
    <div class="row remove-margin">
        <!-- Title -->
        <div class="col-md-4">
            <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
            <a href="" class="header-title-link">
                <h1><i class="fas fa-file-contract animation-expandUp"></i>Archivos<br><small>Bienvenido {{ Auth::user()->name }}</small></h1>
            </a>
        </div>
        <!-- END Title -->

        <!-- Statistics -->
        <div class="col-md-8">
            <!-- Outer Grid -->
            {{-- <div class="row">
                <div class="col-sm-6">
                    <!-- Inner Grid 1 -->
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="page_comp_charts.html" class="header-link">
                                <h1 class="animation-pullDown">
                                    <strong>75</strong><br><small>Sales Today</small>
                                </h1>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a href="page_comp_charts.html" class="header-link">
                                <h1 class="animation-pullDown">
                                    <strong>$795</strong><br><small>Profit Today</small>
                                </h1>
                            </a>
                        </div>
                    </div>
                    <!-- END Inner Grid 1 -->
                </div>
                <div class="col-sm-6">
                    <!-- Inner Grid 2 -->
                    <div class="row">
                        <div class="col-xs-6">
                            <a href="page_special_timeline.html" class="header-link">
                                <h1 class="animation-pullDown">
                                    <strong>7</strong><br><small>Updates</small>
                                </h1>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a href="page_special_message_center.html" class="header-link">
                                <h1 class="animation-pullDown">
                                    <strong>5</strong><br><small>Messages</small>
                                </h1>
                            </a>
                        </div>
                    </div>
                    <!-- END Inner Grid 2 -->
                </div>
            </div> --}}
            <!-- END Outer Grid  -->
        </div>
        <!-- END Statistics -->
    </div>
</div>
<ul class="breadcrumb breadcrumb-top">
    <li><i class="fas fa-file-contract"></i></li>
    <li><a href="{{ route('files.index') }}">Archivos</a></li>
    <li><a href="">Nuevo</a></li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <form action="{{ route('files.store') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
            @csrf
            {{-- <div class="form-group">
                <label class="col-sm-2 control-label" for="bordered-username">Nombre del Archivo</label>
                <div class="col-sm-4">
                    <input type="text" id="name" name="name" class="form-control">
                </div>
            </div> --}}
            <div class="form-group">
                <label class="col-md-2 control-label" for="example-file-input">Tu archivo</label>
                <div class="col-md-5">
                    <input type="file" id="file" name="file">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Subir</button>
                </div>
            </div>
        </form>

    </div>
</div>
<!-- END Dashboard Content -->
@endsection
