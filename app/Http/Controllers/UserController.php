<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function show(User $user)
    {
        $posts = $user->posts;
        return view('user.show',
            [
                'user' => $user,
                'posts' => $posts,
            ]);
    }

    public function edit(User $user)
    {
        return view('user.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|max:120',
            'avatar' => 'nullable|image',
        ]);

        if ($request->hasFile('avatar')){
            $filename = $request->file('avatar')->store('users', 'public');
            $user->update([
                'avatar' => $filename,
                'name' => $data['name']
            ]);
        } else {
            $user->update(['name' => $data['name']]);
        }

        return redirect()
            ->route('user.edit', $user)
            ->with('success', 'Profile updated!');
    }
}
