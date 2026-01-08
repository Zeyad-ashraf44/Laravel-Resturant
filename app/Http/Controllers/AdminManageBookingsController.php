<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Booking;


class AdminManageBookingsController extends Controller
{
    


    //view all bookings
    public function viewBookings()
    {
        $bookings = Booking::with('user')->orderBy('created_at', 'asc')->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function edit($id)
{
    $booking = Booking::findOrFail($id);
    return view('admin.bookings.edit', compact('booking'));
}

public function update(Request $request, $id)
{
    $booking = Booking::findOrFail($id);

   
    $field = $request->input('field');
    $value = $request->input('value');

   
    if ($field === 'number_of_guests' && $value > 5) {
        return response()->json(['success' => false, 'message' => 'Max guests 5 only!']);
    }

    
    if (in_array($field, ['user_id','name', 'phone', 'date', 'time', 'number_of_guests'])) {
        $booking->$field = $value;
        $booking->save();
        return response()->json(['success' => true]);
    }

    return response()->json(['success' => false, 'message' => 'Invalid field!']);
}




   // accept or reject booking
public function approveBooking($id)
{
    Booking::where('id', $id)->update(['status' => 'accepted']);
    return redirect()->back()->with('success', 'Booking approved successfully.');
}

public function rejectBooking($id)
{
    Booking::where('id', $id)->update(['status' => 'rejected']);
    return redirect()->back()->with('success', 'Booking rejected successfully.');
}




}
