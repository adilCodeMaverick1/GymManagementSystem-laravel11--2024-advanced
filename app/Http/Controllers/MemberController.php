<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Membership;
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $memberships = Membership::all();
        //dd($memberships);
        return view('members.create', compact('memberships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:members',
            'gender' => 'required|in:male,female,other',
            'join_date' => 'required|date',
            'age' => 'required|integer|min:18',
            'membership_id' => 'required|exists:memberships,id',
        ]);
        

        $member = new Member($validated);
        $member->save();

        return redirect()->route('members.index')->with('success', 'Member added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Member::find($id);
        $memberships = Membership::all();
        return view('members.edit', compact('member','memberships'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Member $member)
{
    $validated = $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:members,email,' . $member->id,
        'gender' => 'required|in:male,female,other',
        'join_date' => 'required|date',
        'age' => 'required|integer|min:18',
        'membership_id' => 'required|exists:memberships,id',
    ]);

    $member->update($validated);

    return redirect()->route('members.index')->with('success', 'Member updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
