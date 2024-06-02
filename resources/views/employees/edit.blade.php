<x-app-layout>
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Edit Employee</h1>
    <form action="{{ route('employees.update', $employee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block text-gray-700">Name</label>
            <input type="text" name="name" id="name" class="form-input mt-1 block w-full" value="{{ $employee->name }}" required>
        </div>
        <div class="mb-4">
            <label for="position" class="block text-gray-700">Position</label>
            <input type="text" name="position" id="position" class="form-input mt-1 block w-full" value="{{ $employee->position }}" required>
        </div>
        <div class="mb-4">
            <label for="salary" class="block text-gray-700">Salary</label>
            <input type="number" name="salary" id="salary" class="form-input mt-1 block w-full" value="{{ $employee->salary }}" required>
        </div>
        <div class="mb-4">
            <label for="hired_date" class="block text-gray-700">Hired Date</label>
            <input type="date" name="hired_date" id="hired_date" class="form-input mt-1 block w-full" value="{{ $employee->hired_date }}" required>
        </div>
        <div class="mb-4">
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Update Employee</button>
        </div>
    </form>
</div>
</x-app-layout>