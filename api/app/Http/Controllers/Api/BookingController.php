<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Booking;
use Carbon\Carbon;


class BookingController extends Controller
{

    public function index()
    {
        $bookings = Booking::get();

        return response($bookings, 200);
    }

    public function filter($datefilter)
    {

        if ($datefilter == "Past") {
            $operator = "<";
        } else if ($datefilter == "Future") {
            $operator = ">";
        } else {
            return $this->index();
        }

        $bookings = Booking::where('booking_date', $operator, Carbon::now())->get();

        return response($bookings, 200);
    }


    public function create(Request $request)
    {
        $requestData = $request->all();

        $validator = Validator::make($requestData, [
            'booking_date' => 'date|required|max:55',
            'reason' => 'required',
            'name' => 'required',
            'surname' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()
            ], 422);
        }

        $booking = Booking::create($requestData);


        return response($booking, 200);
    }
}
