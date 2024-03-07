<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AERTICKET Test task</title>

    <!-- Styles -->
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="antialiased">
<div id="alert">
</div>
<div class="container-fluid">
    <form id="form">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="validAuth" checked>
            <label class="form-check-label" for="validAuth">
                Send valid authorization
            </label>
        </div>
        <div class="form-group mb-3">
            <label for="departureAirport">Departure airport</label>
            <input class="form-control" id="departureAirport" placeholder="Enter departure airport">
        </div>
        <div class="form-group mb-3">
            <label for="arrivalAirport">Arrival airport</label>
            <input class="form-control" id="arrivalAirport" placeholder="Enter arrival airport">
        </div>
        <div class="form-group mb-3">
            <label for="departureDate">Departure date</label>
            <input class="form-control" id="departureDate" placeholder="Enter departure date">
        </div>
        <button id="submit" type="button" class="btn btn-primary">Submit</button>
    </form>

    <div class="pt-4">
        <table id="table" class="table-sm"></table>
    </div>
</div>
</body>
</html>

