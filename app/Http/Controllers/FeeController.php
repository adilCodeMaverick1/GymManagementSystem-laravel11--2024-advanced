<?php

namespace App\Http\Controllers;
use App\Models\Fee;
use App\Models\Member;
use App\Models\Membership;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = Fee::all();
        return view('fee.index', compact('fees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members=Member::all();
        $memberships=Membership::all();
        return view('fee.create',compact('members','memberships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'member_id' => 'required',
        'membership_id' => 'required',
        'collected_by_user_id' => 'required',
        'month' => 'required',
        'voucher_number' => 'required|unique:fees',
        'amount' => 'required',
    ]);

    $existingFee = Fee::where('member_id', $validated['member_id'])
                        ->where('month', $validated['month'])
                        ->exists();

    if ($existingFee) {
        return redirect()->route('fees.index')->with('error', 'Fee already given for this month.');
    }

    Fee::create($validated);

    return redirect()->route('fees.index')->with('success', 'Fee created successfully.');
}

    

    /**
     * Display the specified resource.
     */
    public function show(Fee $fee)
    {
        $pdf = new Dompdf();
        $pdf->loadHtml(view('fee.fee-pdf.feereceipt', compact('fee'))->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();
        return $pdf->stream('fee_receipt.pdf');
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('fee.edit', compact('fee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fee $fee)
{
    $validated = $request->validate([
        'membership_id' => 'required',
        'amount' => 'required',
        'collected_by_user_id' => 'required',
        'month' => 'required',
        'voucher_number' => 'required|unique:fees,voucher_number,'.$fee->id,
    ]);

    $fee->update($validated);

    return redirect()->route('fee.index')->with('success', 'Fee updated successfully.');
}

public function destroy(Fee $fee)
{
    $fee->delete();

    return redirect()->route('fee.index')->with('success', 'Fee deleted successfully.');
}
}
