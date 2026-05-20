<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::ordered()->get();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.form', ['member' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'role'       => ['required', 'string', 'max:255'],
            'bio'        => ['nullable', 'string'],
            'photo'      => ['nullable', 'image', 'max:4096'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active'  => ['boolean'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }
        $data['is_active']  = $request->boolean('is_active', true);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        TeamMember::create($data);
        return redirect()->route('admin.team.index')->with('success', 'Membro del team creato.');
    }

    public function edit($id)
    {
        $member = TeamMember::findOrFail($id);
        return view('admin.team.form', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = TeamMember::findOrFail($id);

        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'role'       => ['required', 'string', 'max:255'],
            'bio'        => ['nullable', 'string'],
            'photo'      => ['nullable', 'image', 'max:4096'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active'  => ['boolean'],
        ]);

        if ($request->hasFile('photo')) {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $data['photo'] = $request->file('photo')->store('team', 'public');
        }
        $data['is_active']  = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $member->update($data);
        return redirect()->route('admin.team.index')->with('success', 'Membro del team aggiornato.');
    }

    public function destroy($id)
    {
        $member = TeamMember::findOrFail($id);
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }
        $member->delete();
        return redirect()->route('admin.team.index')->with('success', 'Membro eliminato.');
    }
}
