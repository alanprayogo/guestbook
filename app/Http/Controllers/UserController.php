<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function showUser(Request $request)
{
    $role = Role::all();
    $user = User::with('role')->orderBy('created_at', 'asc')->get();

    if (!request()->ajax()) {
        return view('pages.manage-user', compact('role', 'user'));
    }
    return DataTables::of($user)
        ->addIndexColumn()
        ->addColumn('role_name', fn($row) => $row->user->role->role_name ?? '-')
        ->make(true);
}

    public function storeUser(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'phone' => 'required|string|max:20',
        'password' => 'required|string|confirmed',
        'role_id' => 'required|exists:roles,id',
    ]);

    $user = User::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'password' => \Hash::make($validated['password']),
        'role_id' => $validated['role_id'],
    ]);

    return back()->with('success', 'User berhasil ditambahkan.');
}

}
