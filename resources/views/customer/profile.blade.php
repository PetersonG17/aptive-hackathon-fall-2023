<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pest Profile</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart JS -->

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>

    <body class="antialiased vh-100 m-4">
        <div class="container">
            <div class="row">
                <div class="col-1 d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-circle-user fa-2xl"></i>
                </div>
                <div class="col-4 d-flex align-items-center justify-content-start">
                    <h2 class="m-0">{{ $customer->first_name }} {{ $customer->last_name }}</h2>
                </div>
                <div class="col-7 d-flex align-items-center justify-content-end">
                    <h3 class="m-0 text-muted">{{ $customer->id }}</h3>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-6">
                    <canvas id="pests"></canvas>
                </div>
                <div class="col-6">
                    <canvas id="locations"></canvas>
                </div>
            </div>
        </div>
    </body>

    {{-- Scripts for the charts --}}
    <script>
        // Pest Chart
        const ctx_1 = document.getElementById('pests');

        new Chart(ctx_1, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_keys($chartData['pestCounts'])) !!},
                datasets: [
                    {
                        label: 'Pests',
                        data: {!! json_encode(array_values($chartData['pestCounts'])) !!},
                        hoverOffset: 4
                    }
                ]
            }
        });

        // Location Chart
        const ctx_2 = document.getElementById('locations');

        new Chart(ctx_2, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode(array_keys($chartData['locationCounts'])) !!},
                datasets: [
                    {
                        label: 'Locations',
                        data: {!! json_encode(array_values($chartData['locationCounts'])) !!},
                        hoverOffset: 4
                    }
                ]
            }
        });
      </script>
</html>
