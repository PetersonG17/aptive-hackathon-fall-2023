<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Customer Pests</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="antialiased d-flex align-items-center justify-content-center vh-100">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">You are having problems with these pests in these locations. Is this correct?</h5>
                <p class="card-text">Please confirm that we have summarized your pest issues correctly.</p>
                <form action="{{ route('pests.submit') }}" method="POST">
                    @csrf <!-- {{ csrf_field() }} -->
                    @foreach ( $data['pests'] as $pest )
                        <div class="row mb-1">
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text h-100">
                                            <i class="fa-solid fa-bug"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="pests[]" placeholder="Pest" value="{{ $pest['name'] }}">
                                  </div>
                            </div>
                            <div class="col">
                                <div class="input-group mb-3">
                                    <div class="input-group-append">
                                        <span class="input-group-text h-100">
                                            <i class="fa-solid fa-house"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="locations[]" placeholder="Location" value="{{ $pest['location'] }}">
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div class="p-1"></div>
                    <button type="submit" class="btn btn-primary mb-2">Confirm</button>
                </form>
            </div>
        </div>
    </body>
</html>
