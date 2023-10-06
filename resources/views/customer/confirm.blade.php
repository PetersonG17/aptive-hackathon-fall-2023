<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Confirmation</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="antialiased d-flex align-items-center justify-content-center vh-100">\
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-1">
                            <i class="fa-regular fa-circle-check text-success fa-lg"></i>
                        </div>
                        <div class="col-11">
                            <h5 class="mb-0 ml-2">Success!</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <h6 class="card-subtitle text-muted mb-2">We have notified your service pro about the issues you specified.</h6>
                    <table class="table table-hover mb-2">
                        <thead>
                          <tr>
                            <th scope="col"><i class="fa-solid fa-bug"></i></th>
                            <th scope="col"><i class="fa-solid fa-house pr-1"></i></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($pests as $pest)
                                <tr>
                                    <td>{{ $pest['pest'] }}</td>
                                    <td>{{ $pest['location'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
                <a class="btn btn-primary m-3" href="{{ route('customer.profile') }}" role="button">View Your Pest Profile</a>
            </div>
        </div>
    </body>
</html>
