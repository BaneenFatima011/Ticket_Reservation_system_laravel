<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;

use Illuminate\View\View;

use App\Models\Transport;
use App\Models\Routes;
use App\Models\City;
use App\Models\seat;

use Illuminate\Support\Facades\Session;

class RoutesController extends Controller
{
    public function index()
    {
        if (Session::get('role') == 0 && Session::has('loginId') ) {
            
        // Eager load the transportType and company relationships
        $routes = Routes::with('transport','originCity','destinationCity')->paginate(5);        
        // Pass the data to the view
     
        return view('schedule.index', [

            'routes' => $routes,
           
        ]);}
        else{
              
return redirect('/login');
        }
    }
    public function create(): View
    {
        
       
            $transport = Transport::all();
            $city= City::all();
        
            return view('schedule.modal.create', compact(['transport'=>$transport, 'city'=>$city]));
        }
        
    
  
    public function store(Request $request): RedirectResponse
    {
      
    
        
        $input = $request->all();
    
        // Create a new route instance
        $route = new Routes();
     
    // Validate the input data
    $validatedData = $request->validate([
        'origin' => 'required',
        'destination' => 'required',
        'distance' => 'required',
        'duration' => 'required',
        'arrival_time' => 'required|date',
        'departure_time' => 'required|date|before:arrival_time', // Ensure departure time is before arrival time
        'price' => 'required|numeric',
        'bus_id' => 'required',
       
    ]);
    
        // Assign input data to the route instance
        $route->origin = $input['origin'];
        $route->destination = $input['destination'];
        $route->distance = $input['distance'];
        $route->duration = $input['duration'];
        $route->arrival_time = $input['arrival_time'];
        $route->departure_time = $input['departure_time'];
        $route->price = $input['price'];
        $route->bus_id = $input['bus_id'];
    
        // Save the new route instance to the database
        
        $route->save();
        $transport = Transport::find($validatedData['bus_id']);
        if ($transport) {
            $capacity = $transport->capacity;
            for ($i = 1; $i <= $capacity; $i++) {
                $seat = new Seat();
                $seat->route_id = $route->route_id;
                $seat->bus_id = $validatedData['bus_id'];
                $seat->seat_number = $i;
                $seat->status = 'Available'; 
                $seat->save();
            }}
        
    
        // Redirect to the schedule index page with a flash message
        return redirect('schedule')->with('flash_message', 'Route Added!');
    }
    
  
 

   
    public function show(string $id): View
    {
        //shows specific record based on id
        $routes = routes::find($id);
        return view('schedule')->with('routes', $routes);
    }
    
    public function edit(string $id): View
    {
        //retreives record of student with the sepcified id to change details
        $routes = routes::find($id);
    
        
        return view('schedule.edit', [
           
            'routes' => $routes,
           
        ]);}
    
      
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): RedirectResponse
{
    // Validate the request data
    $validatedData = $request->validate([
        'origin' => 'required',
        'destination' => 'required',
        'distance' => 'required|numeric',
        'duration' => 'required',
        'arrival_time' => 'required|date',
        'departure_time' => 'required|date|before:arrival_time', // Ensure departure time is before arrival time
        'price' => 'required|numeric',
        'bus_id' => 'required',
    ]);

    // Find the route record
    $route = Routes::find($id);

    if (!$route) {
        return redirect()->back()->with('message', 'Route not found!');
    }

    // Update the route record with validated data
    $route->update($validatedData);

    $transport = Transport::find($validatedData['bus_id']);

    if ($transport) {
        $capacity = $transport->capacity;
        $existingSeatsCount = Seat::where('route_id', $route->route_id)->count();

        // Update bus_id of existing seats
        Seat::where('route_id', $route->route_id)
            ->update(['bus_id' => $validatedData['bus_id']]);

        if ($existingSeatsCount < $capacity) {
            // Determine the number of new seats to add
            $newSeatsCount = $capacity - $existingSeatsCount;
            
            // Create additional seats if the capacity has increased
            for ($i = 0; $i < $newSeatsCount; $i++) {
                $seat = new Seat();
                $seat->route_id = $route->route_id;
                $seat->bus_id = $validatedData['bus_id'];
                $seat->seat_number = $existingSeatsCount + $i + 1; // Calculate the seat number for the new seat
                $seat->status = 'Available'; 
                $seat->save();
            }
        } elseif ($existingSeatsCount > $capacity) {
            // Delete excess seats if the capacity has decreased
            Seat::where('route_id', $route->route_id)
                ->where('seat_number', '>', $capacity)
                ->delete();
        }
    }

    // Redirect to the schedule index page with a flash message
    return redirect('schedule')->with('flash_message', 'Route Updated!');
}



    public function destroy(string $id): RedirectResponse
    {
        routes::destroy($id);
        
        return redirect('schedule')->with('flash_message', 'transport deleted!'); 
    }
}

