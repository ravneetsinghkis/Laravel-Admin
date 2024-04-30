<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(User $user, Request $request)
    {   
        // $user->update([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'updated_at' => now()
        // ]);

        // return $this->success('profile','Profile updated successfully!');
    }
}
