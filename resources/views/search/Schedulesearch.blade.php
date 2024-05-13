@extends('layout2')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php

$transport_types = \App\Models\TransportType::all();
$cities = \App\Models\City::all();
 
?>
<div class="container mx-auto mt-8">
    <div style="background-color:#C19875" class=" text--black shadow-md rounded px-8 pt-4 pb-2 w-full "> <!-- Adjusted max width -->
        <h2 class="text-center text-xl font-bold mb-6">View Schedule</h2>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg">
       
        <form action="{{ route('search.index') }}" method="GET" class="mb-6">
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
            <button type="submit" class="bg-sky-400 hover:bg-sky-700 text-black font-bold px-4 py-2 mt-4 rounded-lg"> <i class="bi bi-search"></i>Search</button>
        </form>
    
        <h2 class="text-xl font-bold mb-4">
            Search Results:</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Transport Type</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Origin</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Destination</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Arrival Date</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Departure Date</th>
                        <th class="px-6 py-3 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">Distance (in km)</th>
                    </tr>
                </thead>
              
                <table class="table-auto w-full">
                    <tbody>
                        @forelse($searchResults as $result)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $result->transport->transportType->transport_name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $result->originCity->city_name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $result->destinationCity->city_name }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $result->arrival_time }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $result->departure_time }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap">{{ $result->distance }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center text-gray-500">No results found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
           
        </div>
    </div>
</div>

@stop

