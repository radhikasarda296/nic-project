<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class AuthController extends Controller
{
    // Register
    public function register(Request $request)
    {
        // Handle POST request for registration
        if ($request->isMethod("post")) {
            // Validate incoming data
            $request->validate([
                "name" => "required|string",
                "email" => "required|email|unique:users",
                "phone" => "required",
                "password" => "required",
                "role" => "required|string|in:uploader,deleter,viewer,editor,admin"
            ]);

            // Create new user in database
            $user = User::create([
                "name" => $request->name,
                "email" => $request->email,
                "password" => bcrypt($request->password),
                "phone" => $request->phone
            ]);

            // Assign role to the newly created user
            $role = Role::findByName($request->role);
            $user->assignRole($role);

            // Attempt auto-login after registration
            if (Auth::attempt([
                "email" => $request->email,
                "password" => $request->password
            ])) {
                return redirect()->route('dashboard');
            } else {
                return redirect()->route('register');
            }
        }

        // Show registration form
        return view("auth.register");
    }

    // Login
    public function login(Request $request)
    {
        // Handle POST request for login
        if ($request->isMethod("post")) {
            // Validate incoming data
            $request->validate([
                "email" => "required|email",
                "password" => "required"
            ]);

            // Attempt to authenticate user
            if (Auth::attempt([
                "email" => $request->email,
                "password" => $request->password
            ])) {
                return redirect()->route("dashboard");
            } else {
                return redirect()->route("login")->with("error", "Invalid login details");
            }
        }

        // Show login form
        return view("auth.login");
    }

    // Logout
    public function logout()
    {
        // Clear session data
        Session::flush();

        // Logout user
        Auth::logout();

        // Redirect to login page with success message
        return redirect()->route("login")->with("success", "Logged out successfully");
    }

    // Change Password
    public function resetPassword(Request $request)
    {
        // Handle POST request for password reset
        if ($request->isMethod("post")) {
            // Validate incoming data
            $request->validate([
                'current_password' => ['required', 'string'],
                'new_password' => ['required', 'string', 'confirmed'],
            ]);

            // Retrieve authenticated user
            $user = Auth::user();

            // Check if current password matches
            if (!Hash::check($request->current_password, $user->password)) {
                throw ValidationException::withMessages([
                    'current_password' => ['The current password is incorrect.'],
                ]);
            }

            // Update user's password
            $user->password = Hash::make($request->new_password);
            $user->save();

            // Redirect to dashboard with success message
            return redirect()->route('dashboard')->with('success', 'Password updated successfully.');
        }

        // Show password reset form
        return view("auth.reset-password");
    }
}
