@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<!-- Dashboard Header -->
<div class="block-header">
    <div class="row remove-margin">
        <!-- Title -->
        <div class="col-md-4">
            <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
            <a href="" class="header-title-link">
                <h1><i class="fa fa-home animation-expandUp"></i>Dashboard<br><small>Bienvenido {{ Auth::user()->name }}</small></h1>
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
    <li><i class="fa fa-home"></i></li>
    <li><a href="">Dashboard</a></li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-6">
        <!-- Recent Updates Block -->
        <div class="block full">
            <!-- Recent Updates Title -->
            <div class="block-title">
                <h2><i class="fa fa-rss"></i> Novedades</h2>
            </div>
            <!-- END Recent Updates Title -->

            <!-- Update Status Form -->
            {{-- <form action="index.html" method="post" class="profile-status block-top" onsubmit="return false;">
                <textarea id="status-update" name="status-update" rows="3" class="form-control" placeholder="How are you? (Try posting something)"></textarea>
                <div class="clearfix">
                    <button type="submit" id="status-update-btn" class="btn btn-primary pull-right"><i class="fa fa-angle-right"></i> Post</button>
                    <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Add Location"><i class="fa fa-location-arrow"></i></a>
                    <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Record Voice"><i class="fa fa-microphone"></i></a>
                    <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Take Photo"><i class="fa fa-camera"></i></a>
                    <a href="javascript:void(0)" class="btn btn-link btn-icon" data-toggle="tooltip" data-placement="bottom" title="Upload File"><i class="fa fa-cloud-upload"></i></a>
                </div>
            </form> --}}
            <!-- END Update Status Form -->

            <!-- table -->
            <div class="clearfix">
                <div class="btn-group btn-group-sm pull-left push" data-toggle="buttons">
                    <p>Aquí están tus contratos firmados.</p>
                </div>
            </div>
            <div class="table-responsive">
                <table id="example-datatable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Contrato</th>
                            <th>Fecha</th>
                            <th class="text-center">Descargar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($signeds as $signed)
                        <tr>
                            <td style="vertical-align:middle;"><a href="{{ route('contracts.show', $signed->contract_id ) }}">{{ $signed->contract->name }}</a></td>
                            <td style="vertical-align:middle;">{{ $signed->created_at->toFormattedDateString() }}</td>
                            <td class="text-center" style="vertical-align:middle;">
                                <div class="btn-group">
                                    <a href="{{ route('signature.saveImg', $signed->id) }}" class="btn btn-xs btn-default"><i class="fas fa-cloud-download-alt"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- END table -->
        </div>
        <!-- END Recent Updates Block -->
    </div>
    <div class="col-md-6">
        <!-- Quick Stats Block -->
        <div class="block">
            <!-- Quick Stats Title -->
            <div class="block-title">
                <h2 class="text-center"><i class="fa fa-suitcase"></i> Tipo de Plan <small>Active - <a href="page_ready_pricing_tables.html">Actualizar</a></small></h2>
            </div>
            <!-- END Quick Stats Title -->

            <!-- Quick Stats Content -->
            <div class="row">
                {{-- <section>
                    <div class="product">
                      <img
                        src="https://i.imgur.com/EHyR2nP.png"
                        alt="The cover of Stubborn Attachments"
                      />
                      <div class="description">
                        <h3>Stubborn Attachments</h3>
                        <h5>$20.00</h5>
                      </div>
                    </div>
                    <button type="button" id="checkout-button">Checkout</button>
                  </section> --}}

                <div class="col-sm-6">
                    <div class="pie-chart block-section" data-percent="10" data-size="150">
                        <span>1<small>/10</small> <strong></strong></span>
                    </div>
                    {{-- <form id="payment-form" action="{{ route('payments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="plan" id="plan" value="{{ request('plan') }}">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" id="card-holder-name" class="form-control" value="" placeholder="Name on the card">
                        </div>
                        <div class="form-group">
                            <label for="">Card details</label>
                            <div id="card-element"></div>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" id="card-button" >Pay</button>
                    </form> --}}
                </div>

                <div class="col-sm-6">
                    <div class="pie-chart block-section" data-percent="0" data-size="150">
                        <span>0<small>/10</small> <strong></strong></span>
                    </div>
                </div>
            </div>
            <!-- END Quick Stats Content -->
        </div>
        <!-- END Quick Stats Block -->
    </div>
</div>
<!-- END Dashboard Content -->
@endsection

@push('js')
    <script type="text/javascript">
        // Create an instance of the Stripe object with your publishable API key
        var stripe = Stripe("pk_test_51Hfv21KYWi6uPg51qSrnFM7VkEG2pals0wSZGDf9JHgZUr5zPJzm1c0WWqe9LoBCTKaSXLs1OXB1eDI4G5KWr69500w3nrBKGS");
        var checkoutButton = document.getElementById("checkout-button");
        checkoutButton.addEventListener("click", function () {
        fetch("/create-checkout-session.php", {
            method: "POST",
        })
            .then(function (response) {
            return response.json();
            })
            .then(function (session) {
            return stripe.redirectToCheckout({ sessionId: session.id });
            })
            .then(function (result) {
            // If redirectToCheckout fails due to a browser or network
            // error, you should display the localized error message to your
            // customer using error.message.
            if (result.error) {
                alert(result.error.message);
            }
            })
            .catch(function (error) {
            console.error("Error:", error);
            });
        });
    </script>

    <script>
        const stripe = Stripe('{{ config('cashier.key') }}')

        const elements = stripe.elements()
        const cardElement = elements.create('card')

        cardElement.mount('#card-element')

        const form = document.getElementById('payment-form')
        const cardBtn = document.getElementById('card-button')
        const cardHolderName = document.getElementById('card-holder-name')

        form.addEventListener('submit', async (e) => {
            e.preventDefault()

            cardBtn.disabled = true
            const { setupIntent, error } = await stripe.confirmCardSetup(
                cardBtn.dataset.secret, {
                    payment_method: {
                        card: cardElement,
                        billing_details: {
                            name: cardHolderName.value
                        }
                    }
                }
            )

            if(error) {
                cardBtn.disable = false
            } else {
                let token = document.createElement('input')

                token.setAttribute('type', 'hidden')
                token.setAttribute('name', 'token')
                token.setAttribute('value', setupIntent.payment_method)

                form.appendChild(token)

                form.submit();
            }
        })
    </script>
@endpush
