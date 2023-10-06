<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Customer Notes</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body class="antialiased d-flex align-items-center justify-content-center vh-100">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">What pests can we help you take care of today?</h5>
                    <h6 class="card-subtitle text-muted">Please describe the pests and locations that we should target.</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('note.submit') }}" method="POST">
                        @csrf <!-- {{ csrf_field() }} -->
                        <div class="form-group">
                            <textarea class="form-control" name="notes" id="notes" placeholder="I have been having issues with ants in my kitchen. etc..." rows="10" required>{{ old('notes') }}</textarea>
                        </div>
                        <div class="p-1"></div>
                        <button type="submit" class="btn btn-primary mb-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
