<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'phone' => 'nullable|string|max:15',
            'date_of_birth' => 'nullable|date',
            'picture' => 'string',
            'class' => 'string',
            'name' => 'string',
        ]);

        User::where('id', Auth::id())->update([
            'phone' => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'picture' => $request->picture,
            'class' => $request->class,
            'name' => $request->name,
        ]);


        toast('Update Profile Success', 'success');
        return redirect()->back();
    }
}
