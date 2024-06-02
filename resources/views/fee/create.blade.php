<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Create Fee</h1>
        <form action="{{ route('fees.store') }}" method="POST" class="w-full max-w-lg">
            @csrf
            <div class="flex mb-4">
                <div class="w-1/2 pr-2">
                    <label for="member_id" class="block text-gray-700 text-sm font-bold mb-2">Member</label>
                    <select name="member_id" id="member_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach($members as $member)
                            <option value="{{ $member->id }}">{{ $member->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="w-1/2 pl-2">
                    <label for="membership_id" class="block text-gray-700 text-sm font-bold mb-2">Membership</label>
                    <select name="membership_id" id="membership_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach($memberships as $membership)
                            <option value="{{ $membership->id }}">{{ $membership->type }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="flex mb-4">
                <div class="w-1/2 pr-2">
                    <label for="collected_by_user_id" class="block text-gray-700 text-sm font-bold mb-2">Collected By</label>
                    <input type="text" id="collected_by_user_id" name="collected_by_user_id" value="{{ auth()->user()->id }}" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="w-1/2 pl-2">
                    <label for="month" class="block text-gray-700 text-sm font-bold mb-2">Month</label>
                    <select name="month" id="month" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="flex mb-4">
                <div class="w-1/2 pr-2">
                    <label for="voucher_number" class="block text-gray-700 text-sm font-bold mb-2">Voucher Number</label>
                    <input type="text" id="voucher_number" name="voucher_number" value="{{ rand(100000, 999999) }}" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="w-1/2 pl-2">
                    <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Amount</label>
                    <input type="text" id="amount" name="amount" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
            </div>
            @if ($errors->any())
                <div class="mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create Fee</button>
                <a href="{{ route('fees.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
