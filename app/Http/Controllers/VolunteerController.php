<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VolunteerController extends Controller
{
    public function index()
    {
        $volunteers = User::where('is_supervisor', false)->paginate(4);
        return view('volunteer.index', compact('volunteers'));
    }

    public function create()
    {
        return view('volunteer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'is_active' => 'required|boolean',
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'is_supervisor' => false,
            'is_active' => $request->is_active,
        ]);

        $user->save();

        return redirect()->route('volunteers.index')->with('success', 'Volunteer created successfully.');
    }

    public function edit($id)
    {
        $volunteer = User::findOrFail($id);
        return view('volunteer.edit', compact('volunteer'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
            'is_active' => 'required|boolean',
        ]);

        $volunteer = User::findOrFail($id);
        $volunteer->name = $request->name;
        $volunteer->email = $request->email;
        if ($request->password) {
            $volunteer->password = bcrypt($request->password);
        }
        $volunteer->is_active = $request->is_active;
        $volunteer->save();

        return redirect()->route('volunteers.index')->with('success', 'Volunteer updated successfully.');
    }
    public function show($id)
    {
        $volunteer = User::findOrFail($id);
        return view('volunteer.show', compact('volunteer'));
    }
    public function destroy($id)
    {
        $volunteer = User::findOrFail($id);
        $volunteer->delete();

        return redirect()->route('volunteers.index')->with('success', 'Volunteer deleted successfully.');
    }
}
