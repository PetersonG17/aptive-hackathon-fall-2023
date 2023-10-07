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
        <div class="container">
            <div class="row mb-4">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Based on what you told us...</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $data['notes'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">You are having problems with these pests in these locations. Is this correct?</h5>
                            <p class="card-text">Please confirm that we have summarized your pest issues correctly.</p>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('pests.submit') }}" method="POST" id='pest-form'>
                                @csrf <!-- {{ csrf_field() }} -->
                                <input type="hidden" name="notes" value="{{ $data['notes'] }}">
                                @foreach ( $data['pests'] as $pest )
                                    <div class="row mb-1" @if($loop->first) id='row-template' @elseif($loop->last) id='last-row' @endif data-row-index="{{$loop->index}}">
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text h-100">
                                                        <i class="fa-solid fa-bug"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="pest-{{$loop->index}}" placeholder="Pest" value="{{ $pest['pest'] }}" required>
                                              </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group mb-3">
                                                <div class="input-group-append">
                                                    <span class="input-group-text h-100">
                                                        <i class="fa-solid fa-house"></i>
                                                    </span>
                                                </div>
                                                <input type="text" class="form-control" name="location-{{$loop->index}}" placeholder="Location" value="{{ $pest['location'] }}" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-check">
                                                <label class="form-check-label" for="isRecurring">Is this a recurring issue?</label>
                                                <input class="form-check-input" type="checkbox" name="recurring-{{$loop->index}}" id="isRecurring">
                                              </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="row">
                                    <div class="col-12 d-flex align-items-center justify-content-start">
                                        <button type="button" id='add-row-button' class="btn btn-light"><i class="fa-solid fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="p-1"></div>
                                <button type="submit" class="btn btn-primary mb-2 mt-1">Confirm</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </body>

    <script>
        // Set listener on the plus button
        document.getElementById("add-row-button").addEventListener("click", addRow);

        function addRow() {
            var form = document.getElementById('pest-form');
            var rowTemplate = document.getElementById('row-template').cloneNode(true);

            var lastRow = document.getElementById('last-row');
            var lastIndex = lastRow.getAttribute('data-row-index');

            // Swap the last row to the new row
            lastRow.removeAttribute('id')
            rowTemplate.setAttribute('id', 'last-row');

            // Adjust the input names on the new row to be the next index on the iteration
            var pestInput = rowTemplate.querySelector('input[name="pest-0"]');
            var locationInput = rowTemplate.querySelector('input[name="location-0"]');
            var checkboxInput = rowTemplate.querySelector('input[name="recurring-0"]');

            var nextIndex = parseInt(lastIndex) + 1;
            pestInput.setAttribute('name', 'pest-' + nextIndex);
            pestInput.setAttribute('value', "");
            locationInput.setAttribute('name', 'location-' + nextIndex);
            locationInput.setAttribute('value', "");
            checkboxInput.setAttribute('name', 'checkbox-' + nextIndex);
            checkboxInput.setAttribute('value', "");

            // And swap the adjust the data row index for the new row
            rowTemplate.setAttribute('data-row-index', nextIndex);

            // Insert the new row at the end of the form
            lastRow.after(rowTemplate);
        }

    </script>
</html>
