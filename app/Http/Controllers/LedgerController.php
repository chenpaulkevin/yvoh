<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ledger;

class LedgerController extends Controller
{
    public function index()
    {
        return view('pages.ledgers.view');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'location' => 'required|max:255',
            'contact_person' => 'required|max:255',
            'contact_number' => 'required|max:255|',
            'manager_id' => 'required|max:255',
            'beginning_balance' => 'required|max:255|numeric',
        ],
            // for custom error messages
            [
                'name.required' => 'Ledger name is required.',
                'location.required' => 'Location is required.',
                'contact_person.required' => 'Contact person is required.',
                'contact_number.required' => 'Contact number is required.',
                'manager_id.required' => 'Manager is required.',
                'beginning_balance.required' => 'Beginning Balance is required.',
                'beginning_balance.numeric' => 'Beginning Balance must be numeric.'
            ]);
        Ledger::create($validatedData);
        return back()->with('success_message', 'Ledger Successfully Added!');
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
