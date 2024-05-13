<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\TransportType;
use App\Models\Transport;
use App\Models\routes;
use Illuminate\Support\Facades\Session;

class SearchController extends Controller
{
    public function index(Request $request)
{
    if (Session::get('role') == 0 && Session::has('loginId') ) {
        
    // Retrieve all transport types and cities to populate dropdowns in the search form
    $transport_types = TransportType::all();
    $cities = City::all();

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
        $searchResults = Routes::with('transport.transportType','originCity','destinationCity')->paginate(5);  
    } 
    else {
        // Execute the query and get the search results
        $searchResults = $routesQuery->get();
       
  
       
    }
    Log::info('Search results:', $searchResults->toArray());
    $searchResults = compact('searchResults');
    Log::info('Search results:', $searchResults);
    // Pass data to the view
    return view('search.Schedulesearch', $searchResults);


}
else{
    return redirect('/login');
}
  

}}

    