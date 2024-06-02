<x-app-layout>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Add Employee</h1>
    <form action="{{ route('employees.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="form-input mt-1 block w-full" placeholder="Enter name" required>
        </div>
        <div class="mb-4">
            <label for="position" class="block text-sm font-medium text-gray-700">Position</label>
            <input type="text" name="position" id="position" class="form-input mt-1 block w-full" placeholder="Enter position" required>
        </div>
        <div class="mb-4">
            <label for="salary" class="block text-sm font-medium text-gray-700">Salary</label>
            <input type="text" name="salary" id="salary" class="form-input mt-1 block w-full" placeholder="Enter salary" required>
        </div>
        <div class="mb-4">
            <label for="hired_date" class="block text-sm font-medium text-gray-700">Hired Date</label>
            <input type="date" name="hired_date" id="hired_date" class="form-input mt-1 block w-full" required>
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Save</button>
        </div>
    </form>
</div>
</x-app-layout>
