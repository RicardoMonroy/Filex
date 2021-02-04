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

            </div>
            <input type="hidden" name="contractName" id="contractName" value="{{ $contract->name }}">
            <input type="hidden" name="contractId" id="contractId" value="{{ $contract->id }}">
            <h2><i class="fas fa-file-contract"></i> {{ $contract->name }}</h2>
        </div>
        {{-- <div class="row gutter30 block-section">
            <div class="col-sm-6">
                <input type="hidden" name="ownerName" id="ownerName" value="{{ $contract->owner->name }}">
                <input type="hidden" name="ownerMail" id="ownerMail" value="{{ $contract->owner->email }}">
                <input type="hidden" name="ownerLegalName" id="ownerLegalName" value="{{ isset($ownerSignature->legalName) ? $ownerSignature->legalName : ''}}">
                <input type="hidden" name="ownerRFC" id="ownerRFC" value="{{ isset($ownerSignature->rfc) ? $ownerSignature->rfc : '' }}">
                <input type="hidden" name="ownerSerial" id="ownerSerial" value="{{ $serialOwner }}">
                <input type="hidden" name="ownerSignature" id="ownerSignature" value="{{ isset($ownerSignature->string) ? $ownerSignature->string : '' }}">
                <input type="hidden" name="ownerDateSign" id="ownerDateSign" value="{{ isset($ownerSignature->created_at) ? $ownerSignature->created_at->toFormattedDateString() : '' }}">

                <h3 class="sub-header"><i class="fa fa-user"></i> {{ $contract->owner->name }}</h3>
                <address>
                    <strong>Nombre</strong> {{$contract->owner->name}}<br>
                    <strong>Nombre Legal</strong> {{ isset($ownerSignature->legalName) ? $ownerSignature->legalName : '' }}<br>
                    <strong>RFC</strong> {{ isset($ownerSignature->rfc) ? $ownerSignature->rfc : '' }}<br>
                    <strong>No. de Serie</strong> {{ $serialOwner }}<br><br>
                    <strong>Firma:</strong><br>
                    <textarea id="default-textarea" name="default-textarea" rows="6" class="form-control" placeholder="" disabled>{{ isset($ownerSignature->string) ? $ownerSignature->string : '' }}</textarea>
                </address>
            </div>
            <div class="col-sm-6">
                <input type="hidden" name="guestName" id="guestName" value="{{ isset($contract->guest->name) ? $contract->guest->name : 'Pendiente...' }}">
                <input type="hidden" name="guestMail" id="guestMail" value="{{ isset($contract->guest->email) ? $contract->guest->email : 'Pendiente...' }}">
                <input type="hidden" name="guestLegalName" id="guestLegalName" value="{{ isset($guestSignature->legalName) ? $guestSignature->legalName : '' }}">
                <input type="hidden" name="guestRFC" id="guestRFC" value="{{ isset($guestSignature->rfc) ? $guestSignature->rfc : '' }}">
                <input type="hidden" name="guestSerial" id="guestSerial" value="{{ $serialGuest }}">
                <input type="hidden" name="guestSignature" id="guestSignature" value="{{ isset($guestSignature->string) ? $guestSignature->string : '' }}">
                <input type="hidden" name="guestDateSign" id="guestDateSign" value="{{ isset($guestSignature->created_at) ? $guestSignature->created_at->toFormattedDateString() : '' }}">

                <h3 class="sub-header text-right">{{ isset($contract->guest->name) ? $contract->guest->name : 'Pendiente...' }} <i class="fa fa-user"></i></h3>
                <address class="text-right">
                    <strong>Nombre</strong> {{isset($contract->guest->name) ? $contract->guest->name : 'Pendiente...'}}<br>
                    <strong>Nombre Legal</strong> {{ isset($guestSignature->legalName) ? $guestSignature->legalName : '' }}<br>
                    <strong>RFC</strong> {{ isset($guestSignature->rfc) ? $guestSignature->rfc : '' }}<br>
                    <strong>No. de Serie</strong> {{ $serialGuest }}<br><br>
                    <strong>Firma:</strong><br>
                    <textarea id="default-textarea" name="default-textarea" rows="6" class="form-control" placeholder="" disabled>{{ isset($guestSignature->string) ? $guestSignature->string : '' }}</textarea>
                </address>
            </div>
        </div> --}}
        <div class="table-responsive">
            <table class="table table-bordered table-vcenter">
                <thead>
                    <tr>
                        <th style="width: 50%;">Firmas</th>
                        <th>Firma Digital</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($signatures as $signature)
                        <input type="hidden" name="Name{{ $loop->iteration }}" id="Name{{ $loop->iteration }}" value="{{ $signature->user->name }}">
                        <input type="hidden" name="Mail{{ $loop->iteration }}" id="Mail{{ $loop->iteration }}" value="{{ $signature->user->email }}">
                        <input type="hidden" name="LegalName{{ $loop->iteration }}" id="LegalName{{ $loop->iteration }}" value="{{ $signature->legalName }}">
                        <input type="hidden" name="RFC{{ $loop->iteration }}" id="RFC{{ $loop->iteration }}" value="{{ $signature->rfc }}">
                        <input type="hidden" name="Serial{{ $loop->iteration }}" id="Serial{{ $loop->iteration }}" value="{{ $signature->serialNumber }}">
                        <input type="hidden" name="Signature{{ $loop->iteration }}" id="Signature{{ $loop->iteration }}" value="{{ $signature->string }}">
                        {{-- <input type="hidden" name="DateSign" id="DateSign" value="{{ $signature->created_at->toFormattedDateString() }}"> --}}
                        <tr>
                            <td>
                                <h4>{{ $signature->user->name }}</h4>
                                <h5>{{ $signature->user->email }}</h5>
                                <span class="label label-info">RFC: {{ $signature->rfc }}</span><br>
                                <span class="label label-success">Nombre Legal: {{ $signature->legalName }}</span><br>
                                <span class="label label-warning">No. de Serie SCD: {{ $signature->serialNumber }}</span>
                            </td>
                            <td>
                                <textarea id="default-textarea" name="default-textarea" rows="6" class="form-control" placeholder="" disabled>{{ $signature->string }}</textarea>
                            </td>
                        </tr>
                        <input type="hidden" name="loop" id="loop" value="{{ $loop->last }}">
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="clearfix">
            <input type="hidden" name="fileName" id="fileName" value="{{ $contract->file->file }}">
            {{-- <iframe width="100%" height="800" src="{{ asset('storage') }}/{{ $contract->file->file }}" frameborder="0"></iframe> --}}
            @if ($active)
                <button type="submit" class="btn btn-lg btn-success pull-right"><i class="fa fa-check"></i> Generar PDF</button>
            @endif

        </div>
    </form>
</div>
<!-- END Dashboard Content -->
@endsection
