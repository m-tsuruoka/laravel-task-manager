<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('admin.index', compact('users'));
    }
    public function edit($id): View
    {
        $user = User::findOrFail($id);
        $tasks = $user->tasks;

        return view('admin.edit', compact('user','tasks'));
    }
    public function updateRole(Request $request, User $user)
    {
        $user->is_admin = $request->is_admin;
        $user->save();

        return redirect('/admin');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/admin');
    }
}
