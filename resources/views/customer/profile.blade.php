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

    <body class="antialiased vh-100 d-flex align-items-center justify-content-center vh-100">
        <div class="container">
            <div class="card">
                <div class="card-header">
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
                </div>
                <div class="card-body">
                    <div class="row mt-3 mb-4">
                        <div class="col">
                            <h5>Most Recent Appointment</h5>
                            <p class="mb-1">{{ $appointments->first()->scheduled_for->toFormattedDayDateString() }}</p>
                            <table class="table table-hover mb-2">
                                <thead>
                                  <tr>
                                    <th scope="col">Treated</th>
                                    <th scope="col"><i class="fa-solid fa-bug"></i></th>
                                    <th scope="col"><i class="fa-solid fa-house pr-1"></i></th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $appointments->first()->pests as $pest)
                                        <tr>
                                            <th scope="row"><i class="fa-regular fa-circle-check text-success"></i></th>
                                            <td>{{ $pest['pest'] }}</td>
                                            <td>{{ $pest['location'] }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-6">
                            <h5>Pests we have treated at your home</h5>
                            <canvas id="pests"></canvas>
                        </div>
                        <div class="col-6">
                            <h5>Locations we have treated for pests at your home</h5>
                            <canvas id="locations"></canvas>
                        </div>
                    </div>
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
