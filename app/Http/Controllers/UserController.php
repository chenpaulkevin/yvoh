<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    public function index()
    {
        return view('pages.transaction.view');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|max:255',
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'designation' => 'required|max:255',
            'password' => 'required|max:255|confirmed',
            'image' => 'nullable|file|image|max:512|mimes:jpg,jpeg',
        ],
            // for custom error messages
            [
                'email.required' => 'Email is required.',
                'first_name.required' => 'First name is required.',
                'last_name.required' => 'Last name is required.',
                'designation.required' => 'Designation is required.',
                'password.required' => 'password is required.',
            ]);
            $validatedData['password'] = Hash::make($validatedData['password']);
            if ($request->image) {
                $imageName = time().'.'.$request->image->extension(); 
                $request->image->move(public_path('images'), $imageName);
                $validatedData['image'] = $imageName;
            }
            
        User::create($validatedData);
        return back()->with('success_message', 'User Successfully Added!');
    }

    public function update(Ledger $ledger)
    {
        // update cart codes here
    }
    
    public function destroy(Ledger $ledger)
    {
        $cart->destroy();
        return back()->with('message', 'Cart item deleted.');
    }
}
