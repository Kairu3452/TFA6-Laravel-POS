<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

/**
 * User Accounts page (staff who can log in to the POS).
 *
 * GET /users -> UserController@index -> resources/views/users/index.blade.php
 *
 * TFA6: the records now come from the "users" table through the
 * User Eloquent model instead of a static PHP array.
 */
class UserController extends Controller
{
    /**
     * List all user accounts.
     */
    public function index(): View
    {
        $users = User::orderBy('id')->get();

        $summary = [
            'total' => $users->count(),
            'active' => $users->where('status', 'Active')->count(),
            'roles' => $users->countBy('role')->all(),
        ];

        return view('users.index', [
            'title' => 'User Accounts',
            'users' => $users,
            'summary' => $summary,
        ]);
    }
}
