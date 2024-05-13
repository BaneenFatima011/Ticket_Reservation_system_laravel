<?php

$transports = \App\Models\Transport::all();
$city = \App\Models\City::all();
?>
@extends('layout2')
@section('content')
<div class="flex justify-center mt-4 h-screen">
    <div class="max-w-md w-full ">
        <div style="background-color:#C19875" class=" text-black shadow-md rounded px-8 pt-4 pb-2 w-full max-w-4xl">
            <h2 class="text-center text-xl font-bold mb-6 "><a href="/schedule">Manage Locations</a> > Edit</h2>
        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-4xl">
            <form action="{{ url('schedule/' .$routes->route_id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$routes->route_id}}" />
                <div class="mb-4">
                    <label for="bus_id" class="block text-sm font-medium text-gray-700">Bus Id</label>
                    <select for="bus_id" type="text" name="bus_id" id="bus_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach($transports as $item)
                        <option value="{{ $item->bus_id }}">{{ $item->model }}</option>
                    @endforeach
                    </select>
                    @error('origin')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
                </div>
                <div class="mb-4">
                    <label for="origin" class="block text-sm font-medium text-gray-700">Origin</label>
                    <select for="origin" type="text" name="origin" id="origin" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach($city as $item)
                        <option value="{{ $item->city_id }}">{{ $item->city_name }}</option>
                    @endforeach
                    </select>
                    @error('origin')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
                    </div>
                <div class="mb-4">
                    <label for="destination" class="block text-sm font-medium text-gray-700">Destination</label>
                    <select type="text" name="destination" id="destination" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach($city as $item)
                        <option value="{{ $item->city_id }}">{{ $item->city_name }}</option>
                    @endforeach
                    </select>
                    @error('destination')
    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
    @enderror
                    </div>
                <div class="mb-4">
                    <label for="distance" class="block text-sm font-medium text-gray-700">Distance</label>
                    <input value={{$routes->distance}} type="text" name="distance" id="distance" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('origin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
                    <input value={{$routes->duration}} type="time" name="duration" id="duration" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('origin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="departure_time" class="block text-sm font-medium text-gray-700">Departure Time</label>
                    <input value="{{ $routes->departure_time }}" type="datetime-local" name="departure_time" id="departure_time" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('departure_time')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="arrival_time" class="block text-sm font-medium text-gray-700">Arrival Time</label>
                    <input value="{{ $routes->arrival_time }}" type="datetime-local" name="arrival_time" id="arrival_time" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('arrival_time')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input value="{{ $routes->price }}" type="number" name="price" id="price" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('origin')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                </div>
                <button type="submit" class="mb-4 bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600 w-full">Update</button>
            </form>
        </div>
    </div>
</div>
@stop
