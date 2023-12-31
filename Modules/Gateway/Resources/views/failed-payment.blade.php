<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon icon -->
    @include('gateway::partial.favicon')
    <title>{{ __('Something Went Wrong.') }}</title>
    <link href="{{ asset('Modules/Gateway/Resources/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('Modules/Gateway/Resources/assets/css/gateway.min.css') }}">
</head>

<body>
    <section class="card-width card2 pb-5 failed-block">
        <div class="svg-1">
            @include('gateway::partial.logo')
        </div>
        <h5 class="text-center my-4">
            {{ $message ?? __('Something went wrong when processing the payment. Please retry later.') }}</h5>
          <a href={{route('site.index')}} class="d-flex my-4 position-relative back return">
            <svg class="return-arrow position-absolute" xmlns="http://www.w3.org/2000/svg" width="15"
                height="10" viewBox="0 0 15 10" fill="none">
                <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M4.70711 0L6.12132 1.41421L3.82843 3.70711H13.4142C13.9665 3.70711 14.4142 4.15482 14.4142 4.70711C14.4142 5.25939 13.9665 5.70711 13.4142 5.70711H3.82843L6.12132 8L4.70711 9.41421L0 4.70711L4.70711 0Z" fill="currentColor" />
            </svg> {{ __('Close') }}</a>

    </section>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        var response = {
            {
                status: "failed",
                message: "{{ __('Payment failed') }}",
            }
        }
    </script>
    <script src="{{ asset('Modules/Gateway/Resources/assets/js/app.min.js') }}"></script>
</body>

</html>
