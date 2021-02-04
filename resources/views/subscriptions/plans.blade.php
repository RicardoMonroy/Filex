@extends('layouts.app', ['activePage' => 'Plans', 'titlePage' => __('Planes')])

@section('content')
<!-- Dashboard Header -->
<div class="block-header">
    <div class="row remove-margin">
        <!-- Title -->
        <div class="col-md-4">
            <!-- If you do not want a link in the header, instead of .header-title-link you can use a div with the class .header-section -->
            <a href="{{ route('files.index') }}" class="header-title-link">
                <h1><i class="fas fa-columns animation-expandUp"></i>Planes<br><small>Bienvenido {{ Auth::user()->name }}</small></h1>
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
    <li><i class="fas fa-columns animation-expandUp"></i></li>
    <li><a href="#">Planes</a></li>
</ul>
<!-- END Dashboard Header -->

<!-- Dashboard Content -->
<div class="row gutter30">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">{{ __('Subscription Plans') }}</div>

            <div class="card-body">
                @foreach($plans as $plan)
                <form action="/your-server-side-code" method="POST">
                    <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_51Hfv21KYWi6uPg51qSrnFM7VkEG2pals0wSZGDf9JHgZUr5zPJzm1c0WWqe9LoBCTKaSXLs1OXB1eDI4G5KWr69500w3nrBKGS"
                            data-amount="19"
                            data-name="Stripe Demo"
                            data-description="{{ $plan->title}}"
                            data-image="{{ asset('backend/img/template/brand.png') }}"
                            data-locale="auto"
                            data-label="Seleccionar"
                            data-email="{{ Auth()->user()->email }}"
                            data-currency="usd">
                    </script>
                </form>
                    {{-- <section>
                        <div class="product">
                        <div class="description">
                            <h3>{{ $plan->title }}</h3>
                            <h5>$20.00</h5>
                        </div>
                        </div>
                        <button type="button" id="checkout-button">Checkout</button>
                    </section> --}}
                    {{-- <div>
                        <a id="checkout-button" href="{{ route('payments', ['plan' => $plan->identifier]) }}">{{$plan->title}}</a>
                    </div> --}}
                @endforeach
            </div>
        </div>
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
@endpush
