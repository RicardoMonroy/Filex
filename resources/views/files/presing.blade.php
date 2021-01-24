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
    <li>Firmar</li>
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

                    {{-- <iframe width="100%" height="800" src="{{ asset('storage') }}/{{ $file->file }}" frameborder="0"></iframe> --}}
                    <div id="pspdfkit" style="width: 100%; height: 800px;"></div>


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
                        {{-- <li>
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Manuscrita</span></h6>
                            {{-- <form action="page_forms_components.php" class="dropzone dz-clickable"><div class="dz-default dz-message"><span>Arrastra aquí tu firma</span></div></form> --}}
                            <div class='centrador'>
                                <canvas id='canvas' width="300" height="200" style='border: 1px solid #CCC;'>
                                    <p>Tu navegador no soporta canvas</p>
                                </canvas>
                            </div>
                            <div class='centrador'>
                                <form id='formCanvas' method='post' action='#' ENCTYPE='multipart/form-data'>
                                    <button type='button' onclick='LimpiarTrazado()'>Borrar</button>
                                    <button type='button' onclick='GuardarTrazado()'>Guardar</button>
                                    <input type='hidden' name='imagen' id='imagen' />
                                </form>
                            </div>
                        </li> --}}
                        <li>
                            <h6><span class="label label-default"><i class="fa fa-check-circle"></i> Creado</span></h6>
                            <a class="btn btn-primary" onclick="generatePDF()"> Generar PDF</a>
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

@push('js')

<script>
    PSPDFKit.load({
      container: "#pspdfkit",
      document: "{{ asset('storage') }}/{{ $file->file }}",
      authPayload: { jwt: "<jwt>" },
      instant: true,
      licenseKey: "U0cEB8PkVlrfilgBN1_5Dt4T98N4889y1okrjnkJVTRj4IPFt-KqXFrhpYQyEikjHFdiEN-9syoFfXDBT-UaIRd17q6x8W5giL3rS1Bfy2mc6rf5R61GSo4SJ_71lG_mrD2PP_HeluwIDpGCBZsa4G2SNzqnzrgppbestFTbmkPfHwlshmYivqPgpL-dpgjcLw_yezEFiOqkM0Anv4OPzuPpv1lhD_llqZGAHKq2vF29r-tw9YV8QqMvsPyZkX6tmPx9mRs8_0BtX5QLSwLlJzAf7sd2e7gGHxvDVI25MKH5hvuhyD_p3jQunbyJ0P4b42M9FScX7xLEJk9gcbAbZoUhN3pbsz8VgCHKvdTrWSYY-G-4VSvGaSK3cgo8bCE5dBee26wJv-AnmXw2FNajE4-w26NOH6F2ZbF6MhGehWzRTQSCqw7lqznqCu387fWD"
    })
      .then(function(instance) {
        // console.log("PSPDFKit loaded", instance);
        instance.totalPageCount; // => 10

        const viewState = instance.viewState;
        viewState.currentPageIndex; // => 0
        instance.setViewState(viewState.set("currentPageIndex", 1));

      })
      .catch(function(error) {
        console.error(error.message);
      });
  </script>
  <script>
      function generatePDF(){
        instance.exportPDF().then(function(buffer) {
            const supportsDownloadAttribute = HTMLAnchorElement.prototype.hasOwnProperty(
                "download"
            );
            const blob = new Blob([buffer], { type: "application/pdf" });
            if (navigator.msSaveOrOpenBlob) {
                navigator.msSaveOrOpenBlob(blob, "download.pdf");
            } else if (!supportsDownloadAttribute) {
                const reader = new FileReader();
                reader.onloadend = function() {
                const dataUrl = reader.result;
                downloadPdf(dataUrl);
                };
                reader.readAsDataURL(blob);
            } else {
                const objectUrl = window.URL.createObjectURL(blob);
                downloadPdf(objectUrl);
                window.URL.revokeObjectURL(objectUrl);
            }
            });
            function downloadPdf(blob) {
            const a = document.createElement("a");
            a.href = blob;
            a.style.display = "none";
            a.download = "download.pdf";
            a.setAttribute("download", "download.pdf");
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            }
      }
  </script>

<script type="text/javascript">
    /* Variables de Configuracion */
    var idCanvas='canvas';
    var idForm='formCanvas';
    var inputImagen='imagen';
    var estiloDelCursor='crosshair';
    var colorDelTrazo='#555';
    var colorDeFondo='#fff';
    var grosorDelTrazo=2;

    /* Variables necesarias */
    var contexto=null;
    var valX=0;
    var valY=0;
    var flag=false;
    var imagen=document.getElementById(inputImagen);
    var anchoCanvas=document.getElementById(idCanvas).offsetWidth;
    var altoCanvas=document.getElementById(idCanvas).offsetHeight;
    var pizarraCanvas=document.getElementById(idCanvas);

    /* Esperamos el evento load */
    window.addEventListener('load',IniciarDibujo,false);

    function IniciarDibujo(){
      /* Creamos la pizarra */
      pizarraCanvas.style.cursor=estiloDelCursor;
      contexto=pizarraCanvas.getContext('2d');
      contexto.fillStyle=colorDeFondo;
      contexto.fillRect(0,0,anchoCanvas,altoCanvas);
      contexto.strokeStyle=colorDelTrazo;
      contexto.lineWidth=grosorDelTrazo;
      contexto.lineJoin='round';
      contexto.lineCap='round';
      /* Capturamos los diferentes eventos */
      pizarraCanvas.addEventListener('mousedown',MouseDown,false);
      pizarraCanvas.addEventListener('mouseup',MouseUp,false);
      pizarraCanvas.addEventListener('mousemove',MouseMove,false);
      pizarraCanvas.addEventListener('touchstart',TouchStart,false);
      pizarraCanvas.addEventListener('touchmove',TouchMove,false);
      pizarraCanvas.addEventListener('touchend',TouchEnd,false);
      pizarraCanvas.addEventListener('touchleave',TouchEnd,false);
    }

    function MouseDown(e){
      flag=true;
      contexto.beginPath();
      valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
      contexto.moveTo(valX,valY);
    }

    function MouseUp(e){
      contexto.closePath();
      flag=false;
    }

    function MouseMove(e){
      if(flag){
        contexto.beginPath();
        contexto.moveTo(valX,valY);
        valX=e.pageX-posicionX(pizarraCanvas); valY=e.pageY-posicionY(pizarraCanvas);
        contexto.lineTo(valX,valY);
        contexto.closePath();
        contexto.stroke();
      }
    }

    function TouchMove(e){
      e.preventDefault();
      if (e.targetTouches.length == 1) {
        var touch = e.targetTouches[0];
        MouseMove(touch);
      }
    }

    function TouchStart(e){
      if (e.targetTouches.length == 1) {
        var touch = e.targetTouches[0];
        MouseDown(touch);
      }
    }

    function TouchEnd(e){
      if (e.targetTouches.length == 1) {
        var touch = e.targetTouches[0];
        MouseUp(touch);
      }
    }

    function posicionY(obj) {
      var valor = obj.offsetTop;
      if (obj.offsetParent) valor += posicionY(obj.offsetParent);
      return valor;
    }

    function posicionX(obj) {
      var valor = obj.offsetLeft;
      if (obj.offsetParent) valor += posicionX(obj.offsetParent);
      return valor;
    }

    /* Limpiar pizarra */
    function LimpiarTrazado(){
      contexto=document.getElementById(idCanvas).getContext('2d');
      contexto.fillStyle=colorDeFondo;
      contexto.fillRect(0,0,anchoCanvas,altoCanvas);
    }

    /* Enviar el trazado */
    function GuardarTrazado(){
      imagen.value=document.getElementById(idCanvas).toDataURL('image/png');
      document.forms[idForm].submit();
    }
    </script>
@endpush
