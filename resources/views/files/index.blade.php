@extends('layouts.app', ['activePage' => 'files', 'titlePage' => __('Mis Archivos')])

@section('content')
<!-- Dashboard Header -->
<div class="block-header">
    <div class="row remove-margin">
        <!-- Title -->
        <div class="col-md-4">
            <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
            <a href="" class="header-title-link">
                <h1><i class="fa fa-file-pdf-o animation-expandUp"></i>Archivos<br><small>Bienvenido {{ Auth::user()->name }}</small></h1>
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
    <li><i class="fa fa-file-pdf-o"></i></li>
    <li><a href="">Archivos</a></li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <!-- Search Block -->
        <div class="clearfix">
            <div class="btn-group btn-group-sm pull-right push">
                <a href="{{ route('files.create') }}" class="btn btn-primary" id="style-hover"><i class="fas fa-plus"></i> Nuevo</a>
            </div>
            <div class="btn-group btn-group-sm pull-left push" data-toggle="buttons">
                <p>Aquí se encuentran todos tus archivos.</p>
            </div>
        </div>
            <div class="table-responsive">
                <table id="example-datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th>Archivo</th>
                            <th>File</th>
                            <th>Creación</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                        <tr>
                            <td class="text-center">{{ $file->id }}</td>
                            <td><a href="{{ route('files.show', $file->id) }}">{{ $file->name }}</a></td>
                            <td>{{ $file->file }}</td>
                            <td>{{ $file->created_at->toFormattedDateString() }} ({{ $file->created_at->DiffForHumans()}})</td>
                            <td class="text-center">
                                <div class="btn-group">
                                    <form action="{{ route('files.destroy',$file->id) }}" method="POST">
                                        @csrf
                                        {{-- <a href="javascript:void(0)" data-toggle="tooltip" title="Edit" class="btn btn-xs btn-default"><i class="fa fa-pencil"></i></a> --}}
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


