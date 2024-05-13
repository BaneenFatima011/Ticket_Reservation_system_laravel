<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\feedback;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class FeedbackController extends Controller
{
   
public function index(Request $request)
{
    if (Session::get('role') == 1 && Session::has('loginId') ) {
        
    $passengerId = $request->session()->get('passenger_id');

    $searchresults = Reservation::where('passenger_id', $passengerId)->with('route','route.originCity', 'route.destinationCity')->get();

    $current_time = Carbon::now();
    
    return view('feedback.feedbackPassenger', compact('searchresults', 'current_time','passengerId'));}
    else{
        return redirect('/login');
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $passenger = $request->input('passenger_id');
        $booking_id = $request->input('booking_id');

    
        // Redirect back to the form view with seats data
        return view('feedback.rating', compact('booking_id', 'passenger'));
    }
    public function add(Request $request)
    {
        $feedback=new feedback;
        $feedback->passenger_id=$request['passenger_id'];
        $feedback->booking_id=$request['booking_id'];
        $feedback->comments=$request['comments'];
        $feedback->rating=$request['rating'];
        
       

      $feedback->save();

        return redirect()->back()->with('success', 'Feedback submitted successfully!');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
