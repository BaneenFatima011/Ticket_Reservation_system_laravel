@extends('layout')
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<?php

$transport_types = \App\Models\TransportType::all();
$cities = \App\Models\City::all();
$companies=\App\Models\Company::all();
 
?>
<div class="flex justify-center items-center mt-5">
    <div class="max-w-4xl w-full">
        <!-- Display Search Results -->
        @php
            $feedbackAvailable = false;
        @endphp

        @forelse($searchresults as $result)
            @php
                $currentTime = now();
                $arrivalTime = \Carbon\Carbon::parse($result->arrival_time);
            @endphp

            @if($arrivalTime->lt($currentTime) && $result->status=='Done')
                <div style="background-color:#C19875" class="text-black shadow-md rounded px-8 pt-4 pb-2 ">
                    <h2 class="text-center text-xl font-bold">Feedback</h2>
                </div>
                <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <p><span class="font-semibold">Transport_name:</span> {{ $result->transport->transportType->transport_name }}</p>
                    <p><span class="font-semibold">Origin:</span> {{ $result->route->originCity->city_name }}</p>
                    <p><span class="font-semibold">Destination:</span> {{ $result->route->destinationCity->city_name }}</p>
                    <p><span class="font-semibold">Arrival Time:</span> {{ $result->route->arrival_time }}</p>
                    <p><span class="font-semibold">Departure Time:</span> {{ $result->route->departure_time }}</p>
                    <p><span class="font-semibold">Distance:</span> {{ $result->route->distance }}</p>
                    <form action="{{ route('feedback.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="passenger_id" value="{{ $result->passenger_id}}">
                        <input type="hidden" name="booking_id" value="{{ $result->reservation_id}}">
                        <button type="submit" class="bg-emerald-400 hover:bg-emerald-700 text-black font-bold py-2 px-4 rounded mt-4">
                            Give Feedback
                        </button>
                    </form>
                    @php
                        $feedbackAvailable = true;
                    @endphp
                </div>
            @endif
        @empty
            <div style="background-color:#C19875" class="text-black shadow-md rounded px-8 pt-4 pb-2 mb-6">
                <h2 class="text-center text-xl font-bold">Feedback</h2>
            </div>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <p class="text-center text-gray-500">No Reservations or Booking exists</p>
            </div>
        @endforelse

        @if(!$feedbackAvailable)
            <div style="background-color:#C19875" class="text-black shadow-md rounded px-8 pt-4 pb-2 mb-6">
                <h2 class="text-center text-xl font-bold">Feedback</h2>
            </div>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <p class="text-center text-gray-500">Feedback Not Available currently</p>
            </div>
        @endif
    </div>
</div>
@stop
