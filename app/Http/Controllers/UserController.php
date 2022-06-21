<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{


    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $users = User::get();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $user = Auth::user();
        return view('user.create');
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        // dd($request->all());
        $request->validate([
            'username' => 'required|unique:users',
            'name' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'password' => bcrypt($request->password),
            'role' => $request->role,

        ]);


        return redirect()->route('users.index');
    }

    public function edit(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $user = User::find($id);
        $request->validate([
            'username' => ['required', Rule::unique('users')->ignore($user)],
            'name' => 'required',
            'role' => 'required',
        ]);

        $user->update([
            'username' => $request->username,
            'name' => $request->name,
            'role' => $request->role,

        ]);

        return redirect()->route('users.index');
    }
    public function destroy($id)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }
        $post = User::find($id);
        $post->delete();
        return redirect()->route('users.index');
    }
}
