<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function uploadImages(Request $request)
    {
        $id_user        = Auth::user()->id;
        $images         = User::where('id', $id_user)->first();
        $filename       = $images->company_logo;
        if ($filename != null) {
            $path       = public_path("storage/uploads/users/" . $filename);
            $msg        = File::delete($path);
        }
        $folderPath     = public_path('storage/uploads/users/');
        $image_parts    = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type     = $image_type_aux[1];
        $image_base64   = base64_decode($image_parts[1]);
        $imageName      = uniqid() . '.jpg';
        $imageFullPath  = $folderPath . $imageName;
        file_put_contents($imageFullPath, $image_base64);
        $data                   = User::findOrFail($id_user);
        $data->company_logo     = $imageName;
        $berhasil               = $data->save();
        if ($berhasil) {
            return '<img src="' . asset("storage/uploads/users/$imageName") . '" class="d-block w-100" />';
        } else {
            return "gagal";
        }
    }

    public function edit(Request $request): View
    {
        return view('admin.pages.profile.index', [
            'user' => $request->user(),
        ]);
    }

    public function changePassword(Request $request): View
    {
        return view('admin.pages.profile.change_pwd', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
