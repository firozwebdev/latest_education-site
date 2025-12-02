<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Store a new contact message in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = \Validator::make($request->all(), [
            'contact-name' => 'required|string|max:255',
            'contact-email' => 'required|email|max:255|unique:contacts,email',
            'subject' => 'required|string|max:255',
            'contact-message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Create a new contact record
            Contact::create([
                'name' => $request->input('contact-name'),
                'email' => $request->input('contact-email'), // This is actually the email field in the form
                'subject' => $request->input('subject'),
                'message' => $request->input('contact-message'),
            ]);

            // Return success response
            return response()->json([
                'success' => true,
                'message' => 'Your message has been successfully saved. Thank you for contacting us!'
            ]);
        } catch (\Exception $e) {
            // Return error response
            return response()->json([
                'success' => false,
                'message' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }
}
