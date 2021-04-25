<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BankAccount;

class BankController extends Controller
{
    public function index()
    {
        return view('pages.banks.view');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'account_number' => 'required|max:255',
            'account_name' => 'required|max:255',
            'manager_id' => 'required|max:255|',
            'ledger_id' => 'required|max:255',
            'beginning_balance' => 'required|max:255|numeric',
        ],
            // for custom error messages
            [
                'name.required' => 'Ledger name is required.',
                'account_number.required' => 'Location is required.',
                'account_name.required' => 'Contact person is required.',
                'cledger_id.required' => 'Contact number is required.',
                'manager_id.required' => 'Manager is required.',
                'beginning_balance.required' => 'Beginning Balance is required.',
                'beginning_balance.numeric' => 'Beginning Balance must be numeric.'
            ]);
            BankAccount::create($validatedData);
        return back()->with('success_message', 'Bank Account Successfully Added!');
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
