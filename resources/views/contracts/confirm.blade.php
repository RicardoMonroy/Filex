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
    <li>Nuevo</li>
    <li>Confirmar Datos</li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-12">
        <form action="{{ route('contracts.store') }}" method="post" class="form-horizontal form-bordered" enctype="multipart/form-data">
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
                            <input type="hidden" name="name" id="name" value="{{ $name}}">
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Título del Contrato</span></h6>
                            <p>{{ $name }}</p>
                        </li>
                        <li>
                            <input type="hidden" name="signerOne" id="signerOne" value="{{ $owner->name}}">
                            <input type="hidden" name="emailOne" id="emailOne" value="{{ $owner->email}}">
                            <input type="hidden" name="IdOne" id="emailOne" value="{{ $owner->id}}">
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Datos del Emisor</span></h6>
                            <p>{{ $owner->name }}</p>
                            <p>{{ $owner->email }}</p>
                        </li>
                        <li>
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Datos del receptor</span></h6>
                            <table class="table table-bordered table-vcenter">
                                <thead>
                                    <th>Email</th>
                                    <th>Nombre</th>
                                </thead>
                                <tbody>
                                    {{-- invitado --}}
                                    @if ($guest_info)
                                        <input type="hidden" name="signerTwo" id="signerTwo" value="{{ $guest_name}}">
                                        <input type="hidden" name="emailTwo" id="emailTwo" value="{{ $guest_email}}">
                                        <input type="hidden" name="IdTwo" id="IdTwo" value="{{ $guest_id}}">
                                        <tr>
                                            <td>
                                                <p>{{ $guest_email }}</p>
                                            </td>
                                            <td>
                                                <p>{{ $guest_name }}</p>
                                            </td>
                                        </tr>
                                    @else
                                        <input type="hidden" name="emailTwo" id="emailTwo" value="{{ $guest_email}}">
                                        <input type="hidden" name="idTwo" id="idTwo" value="{{ $guest_id}}">
                                        <tr>
                                            <td>
                                                <p>{{ $guest_email }}</p>
                                            </td>
                                            <td>
                                                <input type="text" id="signerTwo" name="signerTwo" class="form-control" placeholder="Escribe el nombre completo" autofocus required>
                                            </td>
                                        </tr>
                                    @endif
                                    {{-- Invitado extra 1 --}}
                                    @if (isset($guest_info1))
                                        @if ($guest_info1)
                                            <input type="hidden" name="signerTree" id="signerTree" value="{{ $guest_name1}}">
                                            <input type="hidden" name="emailTree" id="emailTree" value="{{ $guest_email1}}">
                                            <input type="hidden" name="IdTree" id="IdTree" value="{{ $guest_id1}}">
                                            <tr>
                                                <td>
                                                    <p>{{ $guest_email1 }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $guest_name1 }}</p>
                                                </td>
                                            </tr>

                                        @else
                                            <input type="hidden" name="emailTree" id="emailTree" value="{{ $guest_email1}}">
                                            <input type="hidden" name="idTree" id="idTree" value="{{ $guest_id1}}">
                                            <tr>
                                                <td>
                                                    <p>{{ $guest_email1 }}</p>
                                                </td>
                                                <td>
                                                    <input type="text" id="signerTree" name="signerTree" class="form-control" placeholder="Nombre para {{ $guest_email1 }}" autofocus required>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                    {{-- Invitado extra 2 --}}
                                    @if (isset($guest_info2))
                                        @if ($guest_info2)
                                            <input type="hidden" name="signerFour" id="signerFour" value="{{ $guest_name2}}">
                                            <input type="hidden" name="emailFour" id="emailFour" value="{{ $guest_email2}}">
                                            <input type="hidden" name="IdFour" id="IdFour" value="{{ $guest_id2}}">
                                            <tr>
                                                <td>
                                                    <p>{{ $guest_email2 }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $guest_name2 }}</p>
                                                </td>
                                            </tr>

                                        @else
                                            <input type="hidden" name="emailFour" id="emailFour" value="{{ $guest_email2}}">
                                            <input type="hidden" name="idFour" id="idFour" value="{{ $guest_id2}}">
                                            <tr>
                                                <td>
                                                    <p>{{ $guest_email2 }}</p>
                                                </td>
                                                <td>
                                                    <input type="text" id="signerFour" name="signerFour" class="form-control" placeholder="Nombre para {{ $guest_email2 }}" autofocus required>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                    {{-- Invitado extra 3 --}}
                                    @if (isset($guest_info3))
                                        @if ($guest_info3)
                                            <input type="hidden" name="signerFive" id="signerFive" value="{{ $guest_name3}}">
                                            <input type="hidden" name="emailFive" id="emailFive" value="{{ $guest_email3}}">
                                            <input type="hidden" name="IdFive" id="IdFive" value="{{ $guest_id3}}">
                                            <tr>
                                                <td>
                                                    <p>{{ $guest_email3 }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $guest_name3 }}</p>
                                                </td>
                                            </tr>

                                        @else
                                            <input type="hidden" name="emailFive" id="emailFive" value="{{ $guest_email3}}">
                                            <input type="hidden" name="idFive" id="idFive" value="{{ $guest_id3}}">
                                            <tr>
                                                <td>
                                                    <p>{{ $guest_email3 }}</p>
                                                </td>
                                                <td>
                                                    <input type="text" id="signerFive" name="signerFive" class="form-control" placeholder="Nombre para {{ $guest_email3 }}" autofocus required>
                                                </td>
                                            </tr>
                                        @endif
                                    @endif
                                </tbody>
                            </table>
                        </li>
                        <li>
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Mensaje Opcional</span></h6>
                            <textarea id="message" name="message" rows="4" class="form-control" placeholder="Opcionalmente, puedes enviar un mensaje.."></textarea>
                        </li>
                        <li>
                            <input type="hidden" name="fileName" id="fileName" value="{{ $file->name }}">
                            <input type="hidden" name="fileId" id="fileName" value="{{ $file->id }}">
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Datos del Contrato</span></h6>
                            <p>{{ $file->name }}</p>
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
                        <h2><a href="{{ asset('storage') }}/{{ $file->file }}" target="_blank"><i class="fa fa-file-pdf-o"></i></a> Resumen del contrato</h2>
                    </div>
                    <input type="hidden" name="file_path" id="file_path" value="{{ $file->file}}">
                    <iframe width="100%" height="500" src="{{ asset('storage') }}/{{ $file->file }}" frameborder="0"></iframe>


                </div>
                <!-- END Updates Block -->
            </div>
            <!-- END File Column -->


            <div class="form-group">
                <div class="col-sm-10 col-sm-offset-2">
                    <button type="reset" class="btn btn-sm btn-default"><i class="fa fa-times"></i> Borrar</button>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-arrow-right"></i> Enviar</button>
                </div>
            </div>
        </form>


    </div>
</div>

@endsection

