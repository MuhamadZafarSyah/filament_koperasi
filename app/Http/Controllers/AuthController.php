<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.index');
    }

    public function handleAuth(Request $request)
    {
        $action = $request->input('action');

        if ($action == 'login') {
            return $this->login($request);
        } elseif ($action == 'register') {
            return $this->register($request);
        } else {
            return redirect()->back()->withErrors(['Invalid action.']);
        }
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|exists:users',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::user()->role == 'admin') {
                return redirect('/adminsmkn65');
            }
            return redirect('/')->with('success', 'Halo ' . Auth::user()->name . '!');
        } else {
            toast('Login Failed', 'failed')->error('Login failed!');
            return redirect()->back()->with('loginError', 'Login failed!');
        }
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'class' => '',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        }

        $validatedData = $validator->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        toast('Register Failed', 'failed')->error('Register failed!');
        toast('Register Success', 'success');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/auth');
    }
}
