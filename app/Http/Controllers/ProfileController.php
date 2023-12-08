<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
    $validatedData = $request->validated();

    $user->fill($validatedData);

    if ($user->isDirty('email')) {
        $user->email_verified_at = null;
    }

    if ($request->hasFile('profilepic')) {
        $image = $request->file('profilepic');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/image/user'), $imageName);

        if ($user->profilepic && file_exists(public_path('assets/image/user/' . $user->profilepic->getClientOriginalExtension()))) {
            unlink(public_path('assets/image/user/' . $user->profilepic->getClientOriginalExtension()));
        }

        $user->profilepic = $imageName;
    }

    $user->save();

    return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
