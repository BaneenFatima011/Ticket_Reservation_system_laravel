<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Payment;
use Illuminate\Http\Request;
use BaconQrCode\Encoder\QrCode;
use BaconQrCode\Renderer\Image\Png;
use BaconQrCode\Writer;
use Illuminate\Support\Facades\Session;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
  {
    if (Session::get('role') == 0 && Session::has('loginId') ) {
        {
        $input = $request->input("reservation_id");
        $reservation = Reservation::with('route', 'transport', 'passenger')->find($input);
        
        // Always pass reservation variable to the view
        $flashMessage = '';
        if (!$reservation) { 
            // Handle case where reservation with the given ID doesn't exist
            $flashMessage = 'Reservation with ID ' . $input . ' not found.';
        }

        return view('payment.paymentCustomer', compact('reservation', 'flashMessage'));
    }
      
    }
    else{

  
            return redirect('/login');
    }}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->input('reservation_id');
        $payment = new Payment;
        $payment->booking_id = $request->input('reservation_id');
        $payment->status = 'Done';
        $payment->amount = $request->input('price');
        $payment->payment_method = 'Cash';
    
        $payment->save();
        $reservation = Reservation::find($id);
        $reservation->status = 'Done';
        $reservation->update();
       
        return redirect()->back()->with('success', 'Payment successfully recorded.');
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

    /**
     * Display the printable ticket with QR code.
     */
    public function print(string $id)
    {
        $reservation = Reservation::with('seat', 'payment', 'transport.transportType', 'route', 'passenger', 'transport.company', 'route.originCity', 'route.destinationCity')->find($id);
        
        // Create a new QR code instance
       

        // Pass the reservation details and QR code file path to the view
        return view('payment.print', compact('reservation'));
    }
}