<?php

namespace FYP\Http\Controllers;

use FYP\Http\Requests\Users\UpdateProfileRequest;
use Illuminate\Http\Request;

use FYP\User;

class UsersController extends Controller
{
    public function edit()
    {
        return view('users.edit')->with('user', auth()->user());
    }

    public function update(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update([
            'name' => $request->name,
            'about' => $request->about
        ]);

        session()->flash('success', 'Updated');

        return redirect()->back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        session()->flash('success', 'Deleted!');

        return redirect()->back();
    }
}
