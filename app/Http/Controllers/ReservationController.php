<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Seat;
use App\Models\TransportType;
use App\Models\Reservation;
use App\Models\Transport;
use App\Models\routes;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        if (Session::get('role') == 1 && Session::has('loginId') ) {
            
        $passengerId = $request->session()->get('passenger_id');
        // Retrieve all transport types and cities to populate dropdowns in the search form
        $transport_types = TransportType::all();
        $cities = City::all();
        Log::info($passengerId);
        // Retrieve search parameters from the request
        $keyword = $request->input('transport_type');
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $arrival_date = $request->input('arrival_date');
        $departure_date = $request->input('departure_date');
        $distance = $request->input('distance');
        Log::info('Search started successfully.');

        $routesQuery = Routes::query();


        if ($keyword) {
            Log::info('In keyword.');
            $routesQuery->whereHas('transport', function ($query) use ($keyword) {
                $query->whereHas('transportType', function ($query) use ($keyword) {
                    $query->where('transport_type', 'like', '%' . $keyword . '%');
                });
            });
        }

        if ($origin) {
            Log::info('origin');
            $routesQuery->where('origin', $origin);
        }

        if ($destination) {
            Log::info('destination');
            $routesQuery->where('destination', $destination);
        }

        if ($arrival_date) {
            Log::info('arri');
            $routesQuery->whereDate('arrival_time', $arrival_date);
        }

        if ($departure_date) {
            Log::info('depart');
            $routesQuery->whereDate('departure_time', $departure_date);
        }

        if ($distance) {
            Log::info('dist');
            $routesQuery->where('distance', $distance);
        }


        if (!$keyword && !$origin && !$destination && !$arrival_date && !$departure_date && !$distance) {
            $searchResults = Routes::with('transport.transportType', 'originCity', 'destinationCity')->paginate(5);
        } else {
            // Execute the query and get the search results
            $searchResults = $routesQuery->get();
        }
        Log::info('Search results:', $searchResults->toArray());
        $searchResults = compact('searchResults');
        Log::info('Search results:', $searchResults);
        // Pass data to the vie
        return view('reservations.reservationPassenger', $searchResults);}
      
    
    else{
          
        return redirect('/login');
        


    }}
    public function index2(Request $request)
    {
        if (Session::get('role') == 0 && Session::has('loginId') ) {
            
        $passengerId = $request->session()->get('passenger_id');
        // Retrieve all transport types and cities to populate dropdowns in the search form
        $transport_types = TransportType::all();
        $cities = City::all();
        Log::info($passengerId);
        // Retrieve search parameters from the request
        $keyword = $request->input('transport_type');
        $origin = $request->input('origin');
        $destination = $request->input('destination');
        $arrival_date = $request->input('arrival_date');
        $departure_date = $request->input('departure_date');
        $distance = $request->input('distance');
        Log::info('Search started successfully.');
        $routesQuery = Routes::query()->with('reservations.seat', 'reservations.payment', 'transport.transportType', 'reservations', 'reservations.passenger', 'transport.company', 'originCity', 'destinationCity');

        if ($keyword) {
            Log::info('In keyword.');
            $routesQuery->whereHas('transport', function ($query) use ($keyword) {
                $query->whereHas('transportType', function ($query) use ($keyword) {
                    $query->where('transport_type', 'like', '%' . $keyword . '%');
                });
            });
        }

        if ($origin) {
            Log::info('origin');
            $routesQuery->where('origin', $origin);
        }

        if ($destination) {
            Log::info('destination');
            $routesQuery->where('destination', $destination);
        }

        if ($arrival_date) {
            Log::info('arri');
            $routesQuery->whereDate('arrival_time', $arrival_date);
        }

        if ($departure_date) {
            Log::info('depart');
            $routesQuery->whereDate('departure_time', $departure_date);
        }

        if ($distance) {
            Log::info('dist');
            $routesQuery->where('distance', $distance);
        }


        if (!$keyword && !$origin && !$destination && !$arrival_date && !$departure_date && !$distance) {
            $searchResults = Routes::with('reservations.seat', 'reservations.payment', 'transport.transportType', 'reservations', 'reservations.passenger', 'transport.company', 'originCity', 'destinationCity')->paginate(2);
        } else {
            // Execute the query and get the search results
            $searchResults = $routesQuery->paginate(10);
        }
        
        $searchResults = compact('searchResults');
        Log::info('Search results:', $searchResults);
        // Pass data to the view
        return view('reservationAdmin.reservationAdmin', $searchResults);
    }
        else{
            return redirect('/login');
        }
    }
    public function display(Request $request)
{
    if (Session::get('role') == 0 && Session::has('loginId') ) {
        

    // Retrieve search parameters from the request
    $keyword = $request->input('transport_type');
    $origin = $request->input('origin');
    $destination = $request->input('destination');
    $arrival_date = $request->input('arrival_date');
    $departure_date = $request->input('departure_date');
    $distance = $request->input('distance');

    // Query reservations with routes and eager load related models
    $reservationsQuery = Reservation::with(['route', 'route.transport', 'route.transport.transportType','route.originCity', 'route.destinationCity','passenger']);

    // Apply condition to include only reservations with status "Done"
    $reservationsQuery->where('status', 'Done');

    // Apply additional filters based on search parameters
    if ($keyword) {
        $reservationsQuery->whereHas('route.transport.transportType', function ($query) use ($keyword) {
            $query->where('transport_type', 'like', '%' . $keyword . '%');
        });
    }

    if ($origin) {
        $reservationsQuery->whereHas('route', function ($query) use ($origin) {
            $query->where('origin', $origin);
        });
    }

    if ($destination) {
        $reservationsQuery->whereHas('route', function ($query) use ($destination) {
            $query->where('destination', $destination);
        });
    }

    if ($arrival_date) {
        $reservationsQuery->whereHas('route', function ($query) use ($arrival_date) {
            $query->whereDate('arrival_time', $arrival_date);
        });
    }

    if ($departure_date) {
        $reservationsQuery->whereHas('route', function ($query) use ($departure_date) {
            $query->whereDate('departure_time', $departure_date);
        });
    }

    if ($distance) {
        $reservationsQuery->whereHas('route', function ($query) use ($distance) {
            $query->where('distance', $distance);
        });
    }

    // Execute the query to get the search results
    $searchResults = $reservationsQuery->paginate(10); // Adjust the number of results per page as needed

    // Pass data to the view
    return view('Booking.bookingAdmin', compact('searchResults'));}
    else{
          
return redirect('/login');
    }
}





    public function store(Request $request)
    {
        $busId = $request->input('bus_id');
        $route_id = $request->input('route_id');
        //searches by route_id

        $seats = Seat::where('route_id', $route_id)->get();

        // Redirect back to the form view with seats data
        return view('reservations.seats', compact('seats', 'route_id'));
    }

    public function add(Request $request)
    {
        //retreiving the data from previous form
        $busId = $request->input('bus_id');
        $route_id = $request->input('route_id');
        $seatId = $request->input('selected_seat_id');
        $seat = Seat::find($seatId);

        if ($seat) {

            $seat->status = "reserved";
            $seat->save();

            $reservation = new Reservation();
            $passengerId = $request->session()->get('passenger_id');
            $reservation->route_id = $route_id;
            $reservation->transport_id = $busId;
            $reservation->seat_id = $seatId;
            $reservation->status = "Due";
            $reservation->passenger_id = $passengerId;
            $reservation->save();
            $route = Routes::with('originCity', 'destinationCity', 'transport.transportType')->find($route_id);
            Log::info($route);

            $reservationId = $reservation->reservation_id;




            // Calculate reservation expiry time (24 hours from now)
            $expiryTime = Carbon::now()->addHours(24);
            $passengername = $request->session()->get('passenger_name');

            return view('reservations.lastpage', compact('route', 'route_id', 'expiryTime', 'reservationId', 'passengername', 'seatId'));
        } else {
            // Handle if the seat is not found
            return back()->with('error', 'Seat not found.');
        }
    }

    function showTickets(Request $request){
        $passengerId = $request->session()->get('passenger_id');

        $reservations = Reservation::with(['seat', 'passenger', 'seat.transport.transportType','route','transport'])
        ->where('passenger_id', $passengerId)
        ->where('status', 'due')
        ->paginate(1);
        $bookings = Reservation::with(['seat', 'passenger', 'seat.transport.transportType','route','transport'])
        ->where('passenger_id', $passengerId)
        ->where('status', 'Done')
        ->paginate(1);

return view('ticket.tickets', compact('reservations', 'bookings'));

    
}
}
