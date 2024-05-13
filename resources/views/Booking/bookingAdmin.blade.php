@extends('layout2')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php

$transport_types = \App\Models\TransportType::all();
$cities = \App\Models\City::all();
$companies=\App\Models\Company::all();
 
?>
<div class="container mx-auto mt-8">
    <div style="background-color:#C19875" class=" text-black shadow-md rounded px-8 pt-4 pb-2 w-full "> <!-- Adjusted max width -->
        <h2 class="text-center text-xl font-bold mb-6">View Bookings</h2>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg">
       
        <form action="{{ route('Booking.display') }}" method="GET" class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div>
                    <label for="transport_type" class="block text-sm font-medium text-gray-700">Type of Transport</label>
                    <select name="transport_type" id="transport_type" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 w-full">
                        <option value="">Select Transport Type</option>
                        @foreach($transport_types as $transport_type)
                            <option value="{{ $transport_type->transport_id }}">{{ $transport_type->transport_name }}</option>
                        @endforeach
                    </select>
                </div>
               
                <div>
                    <label for="origin" class="block text-sm font-medium text-gray-700">Origin</label>
                    <select name="origin" id="origin" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 w-full">
                        <option value="">Select Origin</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="destination" class="block text-sm font-medium text-gray-700">Destination</label>
                    <select name="destination" id="destination" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 w-full">
                        <option value="">Select Destination</option>
                        @foreach($cities as $city)
                            <option value="{{ $city->city_id }}">{{ $city->city_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="arrival_date" class="block text-sm font-medium text-gray-700">Arrival Date</label>
                    <input type="datetime-local" name="arrival_date" id="arrival_date" value="{{ $arrival_date ?? '' }}" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 w-full">
                </div>
                <div>
                    <label for="departure_date" class="block text-sm font-medium text-gray-700">Departure Date</label>
                    <input type="datetime-local" name="departure_date" id="departure_date" value="{{ $departure_date ?? '' }}" class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 w-full">
                </div>
                <div>
                    <label for="distance" class="block text-sm font-medium text-gray-700">Distance (in km)</label>
                    <input type="number" name="distance" id="distance" value="{{ $distance ?? '' }}" placeholder="Enter distance..." class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 w-full">
                </div>
            </div>
            <button type="submit"  class="bg-sky-500 hover:bg-sky-700 text-black font-bold px-4 py-2 mt-4 rounded-lg"> <i class="bi bi-search"></i>Search</button>
        </form>
    
       
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4">Search Results</h2>
            
            <!-- Display Search Results -->
            @forelse($searchResults as $result)
                <div class="border border-gray-200 p-4 mb-4 rounded-lg">
                    <p><span class="font-semibold">Transport Type:</span> {{ $result->transport->transportType->transport_name }}</p>
                    <p><span class="font-semibold">Passenger Id:</span> {{ $result->passenger_id }}</p>
                    <p><span class="font-semibold">Passenger Name:</span> {{ $result->passenger->name}}</p>
                    <p><span class="font-semibold">Origin:</span> {{ $result->route->originCity->city_name }}</p>
                    <p><span class="font-semibold">Destination:</span> {{ $result->route->destinationCity->city_name }}</p>
                    <p><span class="font-semibold">Arrival Time:</span> {{ $result->route->arrival_time }}</p>
                    <p><span class="font-semibold">Departure Time:</span> {{ $result->route->departure_time }}</p>
                    <p><span class="font-semibold">Distance:</span> {{ $result->route->distance }}</p>
                    <p><span class="font-semibold">Seat Id:</span> {{ $result->seat_id }}</p>


                 
                </div>
            @empty
                <p class="text-center text-gray-500">No results found.</p>
            @endforelse

            <!-- Proceed Button -->
         
        </div>
      
    </div>
    </div>
</div>

@stop

