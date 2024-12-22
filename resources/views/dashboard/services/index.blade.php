<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('services.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add New Service
                    </a>

                    <table class="table-auto w-full mt-4 border-collapse border border-gray-400">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-400 px-4 py-2">#</th>
                                <th class="border border-gray-400 px-4 py-2">Name</th>
                                <th class="border border-gray-400 px-4 py-2">Description</th>
                                <th class="border border-gray-400 px-4 py-2">Service Category</th>
                                <th class="border border-gray-400 px-4 py-2">Service Industry</th>
                                <th class="border border-gray-400 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $service->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $service->description }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $service->serviceCategory->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $service->industry->name ?? 'N/A' }}</td>
                                    <td class="border border-gray-400 px-4 py-2">
                                        <div class="flex space-x-4 justify-center">
                                            <a href="{{ route('services.edit', $service->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all transform hover:scale-105">
                                                Edit
                                            </a>
                                            <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all transform hover:scale-105">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
