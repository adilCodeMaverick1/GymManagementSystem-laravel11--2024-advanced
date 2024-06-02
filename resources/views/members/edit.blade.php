<x-app-layout>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Edit Member</h1>
        <form action="{{ route('members.update', $member->id) }}" method="POST" class="w-full max-w-lg">
            @csrf
            @method('PUT')
            <div class="mb-4 flex">
                <div class="w-1/2 mr-2">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $member->name) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('name')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2 ml-2">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $member->email) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('email')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-4 flex">
                <div class="w-1/2 mr-2">
                    <label for="gender" class="block text-gray-700 text-sm font-bold mb-2">Gender</label>
                    <select id="gender" name="gender" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value="male" {{ $member->gender === 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ $member->gender === 'female' ? 'selected' : '' }}>Female</option>
                        <option value="other" {{ $member->gender === 'other' ? 'selected' : '' }}>Other</option>
                    </select>
                    @error('gender')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2 ml-2">
                    <label for="join_date" class="block text-gray-700 text-sm font-bold mb-2">Join Date</label>
                    <input type="date" id="join_date" name="join_date" value="{{ old('join_date', $member->join_date) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('join_date')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="mb-4 flex">
                <div class="w-1/2 mr-2">
                    <label for="age" class="block text-gray-700 text-sm font-bold mb-2">Age</label>
                    <input type="number" id="age" name="age" value="{{ old('age', $member->age) }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    @error('age')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
                <div class="w-1/2 ml-2">
                    <label for="membership_id" class="block text-gray-700 text-sm font-bold mb-2">Membership</label>
                    <select id="membership_id" name="membership_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach($memberships as $membership)
                            <option value="{{ $membership->id }}" {{ $membership->id === $member->membership_id ? 'selected' : '' }}>{{ $membership->type }}</option>
                        @endforeach
                    </select>
                    @error('membership_id')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Member</button>
                <a href="{{ route('members.index') }}" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
