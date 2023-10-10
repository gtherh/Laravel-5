<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon icon -->
    @include('gateway::partial.favicon')
    <title>@yield('gateway') {{ __('Payment') }}</title>
    <link href="{{ asset('Modules/Gateway/Resources/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('Modules/Gateway/Resources/assets/css/gateway.min.css') }}">
    @yield('css')
</head>

<body>
    <section class="card-width card2">
        <div class="payment-loader">
            <div class="sp sp-circle"></div>
        </div>
        </div>
        <div class="svg-1">
            @include('gateway::partial.logo')
        </div>
        <div class="amount-gateway">
            <div>
                <p class="para-1">{{ __('Amount to be paid') }}</p>
        
            </div>
            <div>
                <p class="para-1 text-end">{{ __('GATEAWAY') }}</p>
                <img class="mt-2 gateway-logo" src="@yield('logo')" alt="{{ __('Image') }}" />
            </div>
        </div>
        @yield('content')
 
    </section>

    <script src="{{ asset('Modules/Gateway/Resources/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/app.min.js') }}"></script>
    @yield('js')
</body>

</html>
