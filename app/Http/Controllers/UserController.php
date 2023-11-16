<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.daftarPengguna', ['users' => $users]);
    }
    public function create()
    {
        return view('user.registrasi');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'username' => ['required', 'string', 'max:255', 'unique:users'],
                'fullname' => ['required', 'string', 'max:255'],
                'email' => ['email'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'address' => ['required', 'string'],
                'birthdate' => ['required', 'date', 'before:today'],
                'phoneNumber' => ['required']
            ],
            [
                'username.required' => 'Username harus diisi',
                'username.unique' => 'Username telah digunakan',
                'birthdate.before' => 'Tanggal lahir harus sebelum hari ini',
            ]
        );

        $user = User::create([

            'username' => $request->username,
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'birthdate' => $request->birthdate,
            'phoneNumber' => $request->phoneNumber,

        ]);

        return redirect()->route('user.daftarPengguna.get');
    }

    public function show(User $user)
    {
        return view('user.infoPengguna', compact('user'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string'],
            'fullname' => ['required', 'string'],
            'email' => ['required', 'string'],
            'address' => ['required', 'string'],
            'birthdate' => ['required', 'date', 'before:today'],
            'phoneNumber' => ['required', 'string']
        ]);

        $affected = DB::table('users')
            ->where('id', $request->id)
            ->update([
                'username' => $request->username,
                'fullname' => $request->fullname,
                'email' => $request->email,
                'address' => $request->address,
                'birthdate' => $request->birthdate,
                'phoneNumber' => $request->phoneNumber
            ]);

        return redirect()->route('user.daftarPengguna.get');
    }
}
