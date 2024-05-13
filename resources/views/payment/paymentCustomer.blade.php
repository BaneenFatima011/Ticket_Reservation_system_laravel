@extends('layout2')
@section('content')

<div class="container mx-auto mt-8">
    <div style="background-color:#C19875" class="text-black shadow-md rounded px-8 pt-4 pb-2 w-full">
        <h2 class="text-center text-xl font-bold mb-6">View Reservations</h2>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <form action="{{ route('payment.index') }}" method="GET" class="mb-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <label for="reservation_id" class="block text-sm font-medium text-gray-700">Reservation Id</label>
                <input type="number" name="reservation_id" id="reservation_id" placeholder="Enter reservation ID..." class="border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-400 w-full">
            </div>
            <button type="submit" class="bg-sky-400 hover:bg-sky-700 text-black font-bold px-4 py-2 mt-4 rounded-lg"> <i class="bi bi-search"></i>Search</button>
        </form>
    </div>

<br>
@if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

    

    <!-- Display Search Results -->
    @if($reservation)
        <div style="background-color:#C19875" class="text-black shadow-md rounded px-8 pt-2 pb-2 w-full">
            <h2 class="text-center text-xl font-bold mb-6">Search Results</h2>
        </div>
        <div class="border border-gray-200 p-4 mb-4 rounded-lg flex flex-wrap">
            <div class="w-1/2 pr-4">
                <p><span class="font-semibold">Transport Type:</span> {{ $reservation->transport->transportType->transport_name }}</p>
                <p><span class="font-semibold">Company Name:</span> {{ $reservation->transport->company->company_name}}</p>
                <p><span class="font-semibold">Model:</span> {{ $reservation->transport->model}}</p>
                <p><span class="font-semibold">Origin:</span> {{ $reservation->route->originCity->city_name }}</p>
                <p><span class="font-semibold">Arrival Time:</span> {{$reservation->route->arrival_time }}</p>
                <p><span class="font-semibold">Distance:</span> {{ $reservation->route->distance }}</p>
            </div>
            <div class="w-1/2 pl-4">
                <p><span class="font-semibold">Passenger Name:</span> {{ $reservation->passenger->name }}</p>
                <p><span class="font-semibold">Payment Status:</span> {{ $reservation->status }}</p>
                <p><span class="font-semibold">Passenger Id:</span> {{ $reservation->passenger_id }}</p>
                <p><span class="font-semibold">Seat Id:</span> {{ $reservation->seat_id }}</p>
                <p><span class="font-semibold">Price:</span> {{ $reservation->route->price }}</p>
            </div>
            @if($reservation->status == 'Done')
            <button disabled class="bg-gray-300 text-gray-700 font-bold py-2 px-4 rounded mt-4">
              Payment Already Made
            </button>
            <a class="bg-emerald-400 hover:bg-emerald-700 text-black font-bold py-2 px-4 rounded mt-4 ml-4" href="{{ route('payment.print', ['id' => $reservation->reservation_id]) }}">Print Reservation</a>
        @else
            <form action="{{ route('payment.store') }}" method="post">
                @csrf
                <input type="hidden" name="price" value="{{ $reservation->route->price }}">
                <input type="hidden" name="reservation_id" value="{{ $reservation->reservation_id }}">
                <button type="submit" class="bg-emerald-400 hover:bg-emerald-700 text-black font-bold py-2 px-4 rounded mt-4">
                    Proceed With Reservation
                </button>

                
            </form>
        @endif
    </div>
</div>
@else
<p class="text-center text-gray-500">{{ $flashMessage }}</p>
@endif


</div></div>

@endsection
