@extends('layout')
@section('content')

<div class="flex justify-center items-center h-screen">
    <div class="w-full max-w-3xl">
        <div class="min-h-screen flex flex-col justify-center items-center">
            <div style="background-color:#C19875" class="text-black shadow-md rounded px-8 pt-4 pb-2 w-full mt-4"> <!-- Adjusted max width -->
                <h2 class="text-center text-xl font-bold mb-6">Reservations</h2>
            </div>
            @foreach($reservations as $reservation)
            <div style="background-color:#414535" class="mt-4 mb-4 rounded-lg relative flex">
                <div class="right w-full rounded flex flex-col p-4 mt-2">
                    <div class="additional-info text-white flex flex-wrap justify-between">
                        <div class="mr-4 font-bold">Origin City:</div>
                        <div class="mr-4 font-bold">Destination City:</div>
                        <div class="mr-4 font-bold">Departure Time:</div>
                        <div class="mr-4 font-bold">Arrival Time:</div>
                        <div class="mr-4 font-bold">Passenger Name:</div>
                        <div class="mr-4 font-bold">Seat:</div>
                    </div>
                    <div class="additional-info text-white flex flex-wrap justify-between">
                        <div class="mr-4"><span class="font-mono">{{ $reservation->route->originCity->city_name }}</span></div>
                        <div class="mr-4"><span class="font-mono">{{ $reservation->route->destinationCity->city_name }}</span></div>
                        <div class="mr-4"><span class="font-mono">{{ $reservation->route->departure_time }}</span></div>
                        <div class="mr-4"><span class="font-mono">{{ $reservation->route->arrival_time }}</span></div>
                        <div class="mr-4"><span class="font-mono">{{ $reservation->passenger->name }}</span></div>
                        <div class="mr-4"><span class="font-mono">{{ $reservation->seat->seat_number }}</span></div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Pagination Links for Reservations -->
            {{ $reservations->links() }}

            <!-- Bookings Section -->
            <div style="background-color:#C19875" class="text-black shadow-md rounded px-8 pt-4 pb-2 w-full mt-4"> <!-- Adjusted max width -->
                <h2 class="text-center text-xl font-bold mb-6">Bookings</h2>
            </div>
            @foreach($bookings as $booking)
            <div style="background-color:#414535" class="mt-4 mb-4 rounded-lg relative flex">
                <div class="right w-full rounded flex flex-col p-4 mt-2">
                    <div class="additional-info text-white flex flex-wrap justify-between">
                        <div class="mr-4 font-extrabold">Origin City:</div>
                        <div class="mr-4 font-extrabold">Destination City:</div>
                        <div class="mr-4 font-extrabold">Departure Time:</div>
                        <div class="mr-4 font-extrabold">Arrival Time:</div>
                        <div class="mr-4 font-extrabold">Passenger Name:</div>
                        <div class="mr-4 font-extrabold">Seat:</div>
                    </div>
                    <div class="additional-info text-white flex flex-wrap justify-between">
                        <div class="mr-4"><span class="font-mono">{{ $booking->route->originCity->city_name }}</span></div>
                        <div class="mr-4"><span class="font-mono">{{ $booking->route->destinationCity->city_name }}</span></div>
                        <div class="mr-4"><span class="font-mono">{{ $booking->route->departure_time }}</span></div>
                        <div class="mr-4"><span class="font-mono">{{ $booking->route->arrival_time }}</span></div>
                        <div class="mr-4"><span class="font-mono">{{ $booking->passenger->name }}</span></div>
                        <div class="mr-4"><span class="font-mono">{{ $booking->seat->seat_number }}</span></div>
                    </div>
                    <!-- Print Button -->
                    <div class="text-right mt-4">
                        <button class="bg-blue-400 rounded p-1 w-20 text-white" onclick="printDiv(this.parentElement.parentElement)">Print</button>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- Pagination Links for Bookings -->
            {{ $bookings->links() }}
        </div>
    </div>
</div>

@stop

@push('scripts')
<script>
    function printDiv(divId) {
        // Hide other elements on the page
        var elementsToHide = document.querySelectorAll('body > :not(.flex)');
        elementsToHide.forEach(function(element) {
            element.style.display = 'none';
        });

        // Print the specific div
        window.print();

        // Show the hidden elements after printing
        elementsToHide.forEach(function(element) {
            element.style.display = '';
        });
    }
</script>
@endpush
