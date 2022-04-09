<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(Request $request)
    {
        #var_dump($request->name);die();

        $validated = $request->validate([
            'name' => 'required|string',
            'email' => [
                'required',
                'email',
                Rule::unique('users','email')
            ],
            'password' => 'required'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response()->json(['success' => 'User created successfully.']);

        
    }

}
