<?php

namespace FYP\Http\Controllers;

use FYP\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index(Request $request)
    {
        return view('admins.index', [
            'users' => User::paginate(10)
        ]);
    }

    public function create()
    {
        return view('admins.create');
    }

    public function store(Request $request)
    {
        $user = auth()->user()->create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        $user->assignRole('admin');

        session()->flash('success', 'Admin added.');

        return redirect()->route('admins.index');
    }
}
