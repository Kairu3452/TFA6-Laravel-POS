<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\View\View;

/**
 * Customer Accounts page.
 *
 * GET /customers -> CustomerController@index -> resources/views/customers/index.blade.php
 *
 * TFA6: the records now come from the "customers" table through the
 * Customer Eloquent model instead of a static PHP array.
 */
class CustomerController extends Controller
{
    /**
     * List all customer accounts.
     */
    public function index(): View
    {
        $customers = Customer::orderBy('id')->get();

        $summary = [
            'total' => $customers->count(),
            'active' => $customers->where('status', 'Active')->count(),
            'gold' => $customers->where('tier', 'Gold')->count(),
            'points' => $customers->sum('points'),
        ];

        return view('customers.index', [
            'title' => 'Customer Accounts',
            'customers' => $customers,
            'summary' => $summary,
        ]);
    }
}
