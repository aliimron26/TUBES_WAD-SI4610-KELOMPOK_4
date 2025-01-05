<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $profile = $user->profile;
        $interests = $profile ? explode(',', $profile->interest) : [];

        return view('profile.index', compact('user', 'profile', 'interests'));
    }

    public function edit()
    {
        $user = auth()->user();
        $profile = $user->profile;
        $interests = $profile ? explode(',', $profile->interest) : [];
        $availableInterests = ["Casual", "Formal", "Sports", "Vintage", "Edgy", "Preppy"];

        return view('profile.edit', compact('user', 'profile', 'interests', 'availableInterests'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $validated = $request->validate([
            'username' => 'required|string|max:50|unique:users,username,' . $user->id,
            'name' => 'required|string|max:100',
            'bio' => 'nullable|string',
            'interest' => 'nullable|array',
            'profile_image' => 'nullable|image|max:2048',
        ]);

        // Update user data
        $user->update([
            'username' => $validated['username'],
            'name' => $validated['name']
        ]);

        // Handle profile image
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/profile', $imageName);

            if ($user->profile && $user->profile->profile_image) {
                Storage::delete('public/profile/' . $user->profile->profile_image);
            }
        }

        // Update or create profile
        $interests = $request->interest ? implode(',', $request->interest) : null;

        $user->profile()->updateOrCreate(
            ['username' => $user->username],
            [
                'name' => $validated['name'],
                'email' => $user->email,
                'bio' => $validated['bio'],
                'interest' => $interests,
                'profile_image' => $imageName ?? null
            ]
        );

        return redirect()->route('profile.index')
            ->with('success', 'Profile successfully updated');
    }
}
