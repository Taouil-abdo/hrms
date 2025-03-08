<?php

// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\UserNotification;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all(); 
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        
        return redirect()->route('users.index')->with('success', 'User created and notified successfully!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id); 
        return view('users.edit', compact('user')); 
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        

        return redirect()->route('users.index')->with('success', 'User updated successfully and notified!');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);  
        $user->delete(); 

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
    

    
    

}
