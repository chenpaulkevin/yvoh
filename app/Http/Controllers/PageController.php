<?php

namespace App\Http\Controllers;
use App\Models\BankAccount;
use App\Models\Ledger;
use App\Models\Transaction;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    //Views

    public function fetchLedger(){
        $data['ledgers'] = Ledger::get(["name", "id"]);
        return view('pages.transactions.add', $data);
    }
    public function fetchBank(Request $request)
    {
        $data['banks'] = BankAccount::where("ledger_id",$request->ledger_id)->get(["name", "id"]);
        return response()->json($data);
    }

    public function viewLedger()
    {
        return view('pages.ledgers.view');
    }
    public function viewBank()
    {
        return view('pages.banks.view');
    }
    public function viewUser()
    {
        return view('pages.users.view');
    }

    //Create
    public function transactions()
    {
        return view('pages.transactions.add');
    }
    public function addLedger()
    {
        return view('pages.ledgers.add');
    }
    public function addBank()
    {
        $ledgers = Ledger::select('id', 'name')->get();
        
        return view('pages.banks.add', compact('ledgers'));
    }
    public function addUser()
    {
        return view('pages.users.add');
    }

}
