<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GovernanceMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GovernanceMemberController extends Controller
{
    public function index()
    {
        $members = GovernanceMember::ordered()->get();
        return view('admin.governance.index', compact('members'));
    }

    public function create()
    {
        return view('admin.governance.form', ['member' => null]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'role'          => ['required', 'string', 'max:255'],
            'bio'           => ['nullable', 'string'],
            'mandate_info'  => ['nullable', 'string', 'max:255'],
            'photo'         => ['nullable', 'image', 'max:4096'],
            'sort_order'    => ['nullable', 'integer', 'min:0'],
            'is_active'     => ['boolean'],
        ]);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('governance', 'public');
        }
        $data['is_active']  = $request->boolean('is_active', true);
        $data['sort_order'] = $data['sort_order'] ?? 0;

        GovernanceMember::create($data);
        return redirect()->route('admin.governance.index')->with('success', 'Membro creato.');
    }

    public function edit($id)
    {
        $member = GovernanceMember::findOrFail($id);
        return view('admin.governance.form', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = GovernanceMember::findOrFail($id);

        $data = $request->validate([
            'name'          => ['required', 'string', 'max:255'],
            'role'          => ['required', 'string', 'max:255'],
            'bio'           => ['nullable', 'string'],
            'mandate_info'  => ['nullable', 'string', 'max:255'],
            'photo'         => ['nullable', 'image', 'max:4096'],
            'sort_order'    => ['nullable', 'integer', 'min:0'],
            'is_active'     => ['boolean'],
        ]);

        if ($request->hasFile('photo')) {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $data['photo'] = $request->file('photo')->store('governance', 'public');
        }
        $data['is_active']  = $request->boolean('is_active');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        $member->update($data);
        return redirect()->route('admin.governance.index')->with('success', 'Membro aggiornato.');
    }

    public function destroy($id)
    {
        $member = GovernanceMember::findOrFail($id);
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }
        $member->delete();
        return redirect()->route('admin.governance.index')->with('success', 'Membro eliminato.');
    }
}
