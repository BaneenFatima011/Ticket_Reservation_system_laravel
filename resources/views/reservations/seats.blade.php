@extends('layout')
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<div class="min-h-screen flex flex-col justify-center items-center">
    <div style="background-color:#C19875"  class=" text-black shadow-md rounded px-8 pt-4 pb-2 w-full mt-4"> <!-- Adjusted max width -->
        <h2 class="text-center text-xl font-bold mb-6">Seat Selection</h2>
    </div>
    <form action="{{ route('reservations.add') }}" method="POST" class="bg-white shadow-md p-8">
        @csrf
        <div class="flex flex-wrap justify-center">
            <div class="flex flex-col items-center">
                @php
                    $num = 1;
                @endphp
                @foreach ($seats->chunk(3) as $chunk)
                    <div class="flex justify-between">
                        @foreach ($chunk as $seat)
                            <div class="seat w-12 h-12 flex items-center justify-center border-2 border-gray-300 mx-2 my-2 cursor-pointer
                            @if($seat->status === 'Available')
                                bg-green-500 hover:bg-green-700
                                
                            @else
                                bg-red-500 cursor-not-allowed
                            @endif"
                            data-id="{{ $seat->seat_id }}">
                                <img src="images/seat.png" alt="Seat Image">
                                
                               
                                <input type="hidden" name="bus_id" value="{{ $seat->bus_id }}">
                                <input type="hidden" name="route_id" value="{{ $seat->route_id }}">
                            </div>
                            @php
                                $num++;
                            @endphp
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
        <input type="hidden" id="selected_seat_id" name="selected_seat_id">
        <button type="submit" class="mt-8 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Submit</button>
    </form>
</div>

<script>
    document.querySelectorAll('.seat').forEach(seat => {
        seat.addEventListener('click', () => {
            // Check if the seat is available before handling click
            if (seat.classList.contains('bg-green-500')) {
                // Remove the blue color from previously selected seats
                document.querySelectorAll('.bg-blue-500').forEach(selectedSeat => {
                    selectedSeat.classList.remove('bg-blue-500');
                    selectedSeat.classList.add('bg-green-500');
                });
                // Toggle the color of the clicked seat
                seat.classList.remove('bg-green-500');
                seat.classList.add('bg-blue-500');
                // Get the seat_id of the clicked seat
                const seatId = seat.dataset.id;
                // Set the value of the corresponding hidden input field
                document.getElementById('selected_seat_id').value = seatId;
                console.log('Selected seat id:', seatId);
            }
        });
    });
</script>

@stop
