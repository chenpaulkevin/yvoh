<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $fillable = [
        'name',
        'location',
        'contact_person',
        'contact_number',
        'manager_id',
        'beginning_balance'
    ];
    use HasFactory;
    
}
