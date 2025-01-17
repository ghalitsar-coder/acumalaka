<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the request input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    
        // Redirect back with errors if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Create a user in the `users` table
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guest',
        ]);
        // If the role is `guest`, create an entry in the `guests` table
        

            Guest::create([
                'user_id' => $user->id,
                'first_name' => $request->name, // If you want to split name, adjust this logic
                'last_name' => '', // Placeholder; you can add a field for last name in the form
                'email' => $request->email,
                'phone' =>  $request->phone, // Optional; add this to the form if needed
                'address' =>  $request->address, // Optional; add this to the form if needed
            ]);
    
        // Redirect to login with a success message
        return redirect()->route('login')->with('success', 'Registration successful! Please log in.');
    }
    
}
