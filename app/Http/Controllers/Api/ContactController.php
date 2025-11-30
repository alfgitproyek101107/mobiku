<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:60,1')->only(['storeMessage', 'bookTestDrive']);
    }
    public function storeMessage(Request $request)
    {
        // Convert checkbox values to boolean
        $data = $request->all();
        $data['newsletter'] = $request->has('newsletter') && $request->newsletter === 'on';
        $data['privacy_agreed'] = $request->has('privacy') && $request->privacy === 'on';

        $validator = Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:2000',
            'newsletter' => 'boolean',
            'privacy_agreed' => 'required|boolean|accepted',
        ]);

        if ($validator->fails()) {
            // Check if this is a regular form submission (not AJAX)
            if (!$request->expectsJson() && !$request->ajax() && $request->header('Accept') !== 'application/json') {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->except(['_token']));
            }

            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            ContactMessage::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'subject' => $data['subject'],
                'message' => $data['message'],
                'newsletter' => $data['newsletter'],
                'privacy_agreed' => $data['privacy_agreed'],
                'status' => 'unread',
            ]);

            // Check if this is an AJAX request
            if ($request->expectsJson() || $request->ajax() || $request->header('Accept') === 'application/json') {
                return response()->json([
                    'success' => true,
                    'message' => 'Message sent successfully'
                ]);
            }

            // For regular form submissions, redirect back with success message
            return redirect()->back()->with('success', 'Message sent successfully! We will get back to you soon.');

        } catch (\Exception $e) {
            // Check if this is an AJAX request
            if ($request->expectsJson() || $request->ajax() || $request->header('Accept') === 'application/json') {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to send message. Please try again.'
                ], 500);
            }

            // For regular form submissions, redirect back with error message
            return redirect()->back()->with('error', 'Failed to send message. Please try again.');
        }
    }

    public function bookTestDrive(Request $request)
    {
        // Convert checkbox values to boolean
        $data = $request->all();
        $data['privacy_agreed'] = $request->has('privacy_agreed') && $request->privacy_agreed === 'on';

        $validator = Validator::make($data, [
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:20',
            'car_id' => 'required|exists:models,id',
            'booking_date' => 'required|date|after:today',
            'booking_time' => 'required|date_format:H:i',
            'notes' => 'nullable|string|max:1000',
            'privacy_agreed' => 'required|boolean|accepted',
        ]);

        if ($validator->fails()) {
            // Check if this is a regular form submission (not AJAX)
            if (!$request->expectsJson() && !$request->ajax() && $request->header('Accept') !== 'application/json') {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput($request->except(['_token']));
            }

            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Check if the time slot is available
            $existingBooking = Booking::where('car_id', $request->car_id)
                ->where('booking_date', $request->booking_date)
                ->where('booking_time', $request->booking_time)
                ->where('status', '!=', 'cancelled')
                ->first();

            if ($existingBooking) {
                // Check if this is an AJAX request
                if ($request->expectsJson() || $request->ajax() || $request->header('Accept') === 'application/json') {
                    return response()->json([
                        'success' => false,
                        'message' => 'This time slot is already booked. Please select a different time.'
                    ], 409);
                }

                // For regular form submissions, redirect back with error message
                return redirect()->back()->with('error', 'This time slot is already booked. Please select a different time.');
            }

            // Generate booking number
            $bookingNumber = 'TD-' . date('Ymd') . '-' . strtoupper(Str::random(6));

            Booking::create([
                'car_id' => $request->car_id,
                'booking_number' => $bookingNumber,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'booking_date' => $request->booking_date,
                'booking_time' => $request->booking_time,
                'status' => 'pending',
                'notes' => $request->notes,
            ]);

            // Check if this is an AJAX request
            if ($request->expectsJson() || $request->ajax() || $request->header('Accept') === 'application/json') {
                return response()->json([
                    'success' => true,
                    'message' => 'Test drive booked successfully',
                    'booking_number' => $bookingNumber
                ]);
            }

            // For regular form submissions, redirect back with success message
            return redirect()->back()->with('success', 'Test drive booked successfully! Booking number: ' . $bookingNumber);

        } catch (\Exception $e) {
            // Check if this is an AJAX request
            if ($request->expectsJson() || $request->ajax() || $request->header('Accept') === 'application/json') {
                return response()->json([
                    'success' => false,
                    'message' => 'Failed to book test drive. Please try again.'
                ], 500);
            }

            // For regular form submissions, redirect back with error message
            return redirect()->back()->with('error', 'Failed to book test drive. Please try again.');
        }
    }
}
