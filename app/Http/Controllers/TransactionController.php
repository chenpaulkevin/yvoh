<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return view('pages.transaction.view');
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'ledger_id' => 'required|max:255',
            'account' => 'required|max:255',
            'particular' => 'required|max:255',
            'image' => 'nullable|file|image|max:512|mimes:jpg,jpeg',
            'bank_id' => 'required|max:255',
            'amount' => 'required|max:255|numeric',
        ],
            // for custom error messages
            [
                'ledger_id.required' => 'Ledger is required.',
                'account.required' => 'Account is required.',
                'particular.required' => 'Particular is required.',
                'amount.required' => 'Beginning Balance is required.',
                'amount.numeric' => 'Beginning Balance must be numeric.',
            ]);
            if ($request->image) {
                $imageName = time().'.'.$request->image->extension(); 
                $request->image->move(public_path('images'), $imageName);
                $validatedData['image'] = $imageName;
            }
        Transaction::create($validatedData);
        return back()->with('success_message', 'Transaction Successfully Added!');
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
