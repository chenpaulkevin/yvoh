<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $fillable = [
        'name',
        'account_number',
        'account_name',
        'manager_id',
        'ledger_id',
        'beginning_balance'
    ];
    use HasFactory;
}
