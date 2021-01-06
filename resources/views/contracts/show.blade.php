@extends('layouts.app', ['activePage' => 'contracts', 'titlePage' => __('Mostrar')])

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
    <li>Mostrar Contrato</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="block full">
    <form action="{{ route('signature.generate') }}" method="POST">
    @csrf
        <div class="block-title">
            <div class="block-options pull-right">
                <div class="btn-group">
                    <a href="javascript:void(0)" class="btn btn-primary" onclick="window.print();"><i class="fa fa-print"></i> Print</a>
                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="" data-original-title="Save"><i class="fa fa-floppy-o"></i></a>
                    <a href="javascript:void(0)" class="btn btn-primary" data-toggle="tooltip" title="" data-original-title="Delete"><i class="fa fa-times"></i></a>
                </div>
            </div>
            <input type="hidden" name="contractName" id="contractName" value="{{ $contract->name }}">
            <h2><i class="fa fa-file-text-o"></i> {{ $contract->name }}</h2>
        </div>
        <div class="row gutter30 block-section">
            <div class="col-sm-6">
                <input type="hidden" name="ownerName" id="ownerName" value="{{ $contract->owner->name }}">
                <input type="hidden" name="ownerMail" id="ownerMail" value="{{ $contract->owner->email }}">
                <input type="hidden" name="ownerLegalName" id="ownerLegalName" value="{{ $ownerSignature->legalName }}">
                <input type="hidden" name="ownerRFC" id="ownerRFC" value="{{ $ownerSignature->rfc }}">
                <input type="hidden" name="ownerSerial" id="ownerSerial" value="{{ $serialOwner }}">
                <input type="hidden" name="ownerSignature" id="ownerSignature" value="{{ $ownerSignature->string }}">
                <input type="hidden" name="ownerDateSign" id="ownerDateSign" value="{{ $ownerSignature->created_at->toFormattedDateString() }}">

                <h3 class="sub-header"><i class="fa fa-user"></i> {{ $contract->owner->name }}</h3>
                <address>
                    <strong>Nombre</strong> {{$contract->owner->name}}<br>
                    <strong>Nombre Legal</strong> {{ $ownerSignature->legalName }}<br>
                    <strong>RFC</strong> {{ $ownerSignature->rfc }}<br>
                    <strong>No. de Serie</strong> {{ $serialOwner }}<br><br>
                    <strong>Firma:</strong><br>
                    <textarea id="default-textarea" name="default-textarea" rows="6" class="form-control" placeholder="" disabled>{{ $ownerSignature->string }}</textarea>
                </address>
            </div>
            <div class="col-sm-6">
                <input type="hidden" name="guestName" id="guestName" value="{{ $contract->guest->name }}">
                <input type="hidden" name="guestMail" id="guestMail" value="{{ $contract->guest->email }}">
                <input type="hidden" name="guestLegalName" id="guestLegalName" value="{{ $guestSignature->legalName }}">
                <input type="hidden" name="guestRFC" id="guestRFC" value="{{ $guestSignature->rfc }}">
                <input type="hidden" name="guestSerial" id="guestSerial" value="{{ $serialGuest }}">
                <input type="hidden" name="guestSignature" id="guestSignature" value="{{ $guestSignature->string }}">
                <input type="hidden" name="guestDateSign" id="guestDateSign" value="{{ $guestSignature->created_at->toFormattedDateString() }}">

                <h3 class="sub-header text-right">{{ $contract->guest->name }} <i class="fa fa-user"></i></h3>
                <address class="text-right">
                    <strong>Nombre</strong> {{$contract->guest->name}}<br>
                    <strong>Nombre Legal</strong> {{ $guestSignature->legalName }}<br>
                    <strong>RFC</strong> {{ $guestSignature->rfc }}<br>
                    <strong>No. de Serie</strong> {{ $serialGuest }}<br><br>
                    <strong>Firma:</strong><br>
                    <textarea id="default-textarea" name="default-textarea" rows="6" class="form-control" placeholder="" disabled>{{ $guestSignature->string }}</textarea>
                </address>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th style="width: 50%;">Firmas</th>
                        <th>Correo</th>
                        <th class="text-center">Firmado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <h4>{{ $contract->owner->name }}</h4>
                            <span class="label label-info">{{ $ownerSignature->rfc }}</span>
                            <span class="label label-success">Propietario del contrato</span>
                        </td>
                        <td>{{ $contract->owner->email }}</td>
                        <td class="text-center"><span class="label label-default">{{ $ownerSignature->created_at->toFormattedDateString() }}</span></td>
                    </tr>
                    <tr>
                        <td>
                            <h4>{{ $contract->guest->name }}</h4>
                            <span class="label label-info">{{ $guestSignature->rfc }}</span>
                            <span class="label label-success">Invitado a firmar</span>
                        </td>
                        <td>{{ $contract->guest->email }}</td>
                        <td class="text-center"><span class="label label-default">{{ $guestSignature->created_at->toFormattedDateString() }}</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="clearfix">
            <input type="hidden" name="fileName" id="fileName" value="{{ $contract->file->file }}">
            {{-- <iframe width="100%" height="800" src="{{ asset('storage') }}/{{ $contract->file->file }}" frameborder="0"></iframe> --}}
        <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Generar PDF</button>
        </div>
    </form>
</div>
<!-- END Dashboard Content -->
@endsection
