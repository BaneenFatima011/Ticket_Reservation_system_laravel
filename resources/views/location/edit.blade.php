@extends('layout2')
@section('content')
<div class="flex justify-center items-center h-screen">
    <div class="max-w-md w-full space-y-8">
        <div style="background-color:#C19875 class=" text-black shadow-md rounded px-8 pt-4 pb-2 w-full max-w-4xl">
            <h2 class="text-center text-xl font-bold mb-6"><a href="/location">Manage Locations</a> > Edit</h2>
        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full max-w-4xl">
            <form action="{{ url('location/' .$city->city_id) }}" method="post">
                {!! csrf_field() !!}
                @method("PATCH")
                <input type="hidden" name="id" id="id" value="{{$city->city_id}}" />
                <div class="mb-4">
                    <label for="city_name" class="block text-sm font-medium text-gray-700 mb-1">City Name:</label>
                    <input type="text" name="city_name" id="city_name" value="{{$city->city_name}}" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
        
                <div class="mb-4">
                    <label for="country_id" class="block text-sm font-medium text-gray-700 mb-1">Country:</label>
                    <select name="country_id" id="country_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        @foreach($countries as $country)
                        <option value="{{ $country->country_id }}">{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:bg-green-600 w-full">Update</button>
            </form>
        </div>
    </div>
</div>
@stop
