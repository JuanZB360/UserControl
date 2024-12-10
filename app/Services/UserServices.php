<?php

namespace App\Services;

use App\Models\User;
use App\Models\Country;
use App\Enums\Gender;
use App\Http\Requests\UserRequest;

class UserServices
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function index()
    {
        $users = User::with('country')->get;
        return view('users', compact('users'));
    }

    public function create()
    {
        $method = 'POST';
        $countries = Country::all();
        $genders = Gender::case();
        return view('createUser', compact('countries', 'genders', 'method'));
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'lastnames' => $request->lastnames,
            'email' => $request->email,
            'gender' => Gender::from($request->gender),
            'address' => $request->address,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
        ]);

        return redirect()->route('users.index')->with('message', 'Usuario Creado Correctomente!');
    }

    public function show(string $id)
    {
        $method = 'show';
        $user = User::with('country')->get;
        return view('createUser', compact('user', 'method'));
    }

    public function edit(string $id)
    {
        $method = 'edit';
        $user = User::with('country')->find($id);
        $countries = Country::all();
        $genders = Gender::case();
        return view('createUser', compact('user', 'countries', 'genders', 'method'));
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'lastnames' => $request->lastnames,
            'email' => $request->email,
            'gender' => Gender::from($request->gender),
            'address' => $request->address,
            'phone' => $request->phone,
            'country_id' => $request->country_id,
        ]);

        return redirect()->route('users.index')->with('message', 'Usuario Actualizado Correctamente!');
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with('message', 'Usuario Eliminado Correctamente!');
    }
}
