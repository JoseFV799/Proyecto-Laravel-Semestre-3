<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\FlashLog;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ModifyUser(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password =  Hash::make($request->password);
        $user->save();

        return redirect()->route('home');
    }

    public function DeleteUser()
    {
        $id = Auth::id();
        $user = User::where('_id', '=', $id)->delete();
        $posts = Post::where('user_id', '=', $id)->delete();
        return redirect()->route('home');
    }
}