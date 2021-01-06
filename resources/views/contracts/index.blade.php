@extends('layouts.app', ['activePage' => 'contracts', 'titlePage' => __('Mis Contratos')])

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
    <li>Contratos</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <!-- Search Block -->
        <div class="clearfix">
            <div class="btn-group btn-group-sm pull-right push">
                <a href="{{ route('contracts.create') }}" class="btn btn-primary" id="style-hover"><i class="fas fa-plus"></i> Nuevo</a>
            </div>
            <div class="btn-group btn-group-sm pull-left push" data-toggle="buttons">
                <p>Un lugar simple donde se encuentran todos tus contratos.</p>
            </div>
        </div>
            <div class="table-responsive">
                <table id="example-datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Archivo</th>
                            <th>Firmado por</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contracts as $contract)
                        <tr>
                            <td  style="vertical-align:middle;"><a href="{{ route('contracts.show', $contract->id) }}">{{ $contract->name }}</a></td>
                            <td  style="vertical-align:middle;">{{ $contract->file->name }}</td>
                            <td>
                                @foreach ($contract->signatures as $signature)
                                    - {{ $signature->user->name }} / {{ $signature->created_at->toFormattedDateString() }} <br>
                                @endforeach
                            </td>
                            <td class="text-center"  style="vertical-align:middle;">
                                <div class="btn-group">
                                    <div class="col-md-4">
                                        <a href="{{ route('contracts.presign', $contract->id) }}" data-toggle="tooltip" title="Firmar Documento" class="btn btn-xs btn-default"><i class="fa fa-pencil-square"></i></a>
                                    </div>
                                    <div class="col-md-4">
                                        <a href="{{ route('contracts.show', $contract->id) }}" data-toggle="tooltip" title="Reenviar invitación" class="btn btn-xs btn-default"><i class="fa fa-paper-plane"></i></a>
                                    </div>
                                    <div class="col-md-4">
                                        <form action="{{ route('contracts.destroy',$contract->id) }}" method="POST">
                                            @csrf

                                            @method('DELETE')
                                            <button type="submit" data-toggle="tooltip" title="Eliminar" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></button>
                                        </form>
                                    </div>
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


