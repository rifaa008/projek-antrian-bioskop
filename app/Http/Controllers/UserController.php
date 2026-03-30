<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index()
    {
        return response()->json(User::all());
    }

    
    public function store(Request $request)
    {
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password, 
            'role' => $request->role ?? 'user'
        ]);

        return response()->json($user);
    }

    
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Login gagal'], 401);
        }

        return response()->json([
            'message' => 'Login berhasil',
            'user' => $user
        ]);
    }

   
    public function show($id)
    {
        return response()->json(User::findOrFail($id));
    }

    
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json($user);
    }

   
    public function destroy($id)
    {
        User::destroy($id);
        return response()->json(['message' => 'User dihapus']);
    }
}