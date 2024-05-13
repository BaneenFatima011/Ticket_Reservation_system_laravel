<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ticket Information</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        @media print {
            /* Hide print button when printing */
            .no-print  {
                display: none;
            }
            .no-back  {
                display: none;
            }
        }
    </style>
</head>

<body class="bg-gray-100 font-sans">
    <div class="max-w-md mx-auto p-8 bg-white shadow-lg rounded-lg">
        <div style="background-color:#C19875 " class=" text-white rounded-t-lg px-4 py-2">
            <h1 class="text-lg font-semibold">Ticket</h1>
        </div>
        <div class="p-4">
            <p class="text-xl font-semibold text-gray-800 mb-4">{{$reservation->transport->company->company_name}}</p>
            <div class="flex justify-between mb-4">
                <div class="w-1/2">
                    <p><strong>Reservation ID:</strong> {{ $reservation->passenger->passenger_id }}</p>
                    <p><strong>Passenger Name:</strong> {{ $reservation->passenger->name }}</p>
                </div>
                <div class="w-1/2">
                    <p><strong>From:</strong> {{ $reservation->route->originCity->city_name }}</p>
                    <p><strong>To:</strong> {{ $reservation->route->destinationCity->city_name }}</p>
                </div>
            </div>
            <div class="flex justify-between mb-4">
                <div class="w-1/2">
                    <p><strong>Departure Time:</strong> {{ $reservation->route->departure_time }}</p>
                    <p><strong>Arrival Time:</strong> {{ $reservation->route->arrival_time }}</p>
                </div>
                <div class="w-1/2">
                    <p><strong>Seat:</strong> {{ $reservation->seat->seat_id }}</p>
                    <p><strong>Seat:</strong> {{ $reservation->route->duration }}</p>
                </div>
            </div>
        </div>
      
            <button style="background-color: #F2E3BC" class="mt-4 py-2 px-4 bg-emerald-400 hover:bg-emerald-700 rounded-lg text-black font-semibold no-print"
                onclick="window.print()">Print Ticket</button>
   
                <a href="/payment" style="background-color: #618985"  class="mt-4 py-2 px-4 bg-sky-400 hover:bg-sky-700 rounded-lg text-black font-semibold no-back">Back</a>          
    </div>
</body>

</html>
