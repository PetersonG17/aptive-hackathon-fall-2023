<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="antialiased d-flex align-items-center justify-content-center">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Can you tell us more about it?</h5>
                <p class="card-text">Please tell us what pests you're seeing and where our service pros should look for them.</p>
                <form>
                    <div class="form-group">
                        <textarea class="form-control" id="customerNotes" placeholder="I have been having issues with ants in my kitchen. etc..." rows="10"></textarea>
                    </div>
                    <div class="p-1"></div>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </form>
            </div>
        </div>
    </body>
</html>
