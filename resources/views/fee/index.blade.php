<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Fee Records</h1>
        <div class="flex justify-end mb-4">
            <a href="{{ route('fees.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Fee</a>
        </div>
        @if ($fees->isEmpty())
        <p>No fee records found.</p>
        @else
        <div class="overflow-x-auto">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">Member</th>
                        <th class="px-4 py-2">Membership</th>
                        <th class="px-4 py-2">Collected By</th>
                        <th class="px-4 py-2">Month</th>
                        <th class="px-4 py-2">Voucher Number</th>
                        <th class="px-4 py-2">Amount</th>
                        <th class="px-4 py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fees as $fee)
                    <tr>
                        <td class="border px-4 py-2">{{ $fee->member->name }}</td>
                        <td class="border px-4 py-2">{{ $fee->membership->type }}</td>
                        <td class="border px-4 py-2">{{ $fee->user->name }}</td>
                        <td class="border px-4 py-2">{{ date('F', mktime(0, 0, 0, $fee->month, 1)) }}</td>
                        <td class="border px-4 py-2">{{ $fee->voucher_number }}</td>
                        <td class="border px-4 py-2">{{ $fee->amount }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('fees.show', $fee->id) }}" target="_blank">Print Receipt</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</x-app-layout>