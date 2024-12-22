<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jobs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('jobs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add New Job
                    </a>

                    <table class="table-auto w-full mt-4 border-collapse border border-gray-400">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-400 px-4 py-2">#</th>
                                <th class="border border-gray-400 px-4 py-2">Title</th>
                                <th class="border border-gray-400 px-4 py-2">Description</th>
                                <th class="border border-gray-400 px-4 py-2">Type</th>
                                <th class="border border-gray-400 px-4 py-2">Work Mode</th>
                                <th class="border border-gray-400 px-4 py-2">Location</th>
                                <th class="border border-gray-400 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $job->title }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $job->description }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ ucfirst($job->type) }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ ucfirst($job->work_mode) }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $job->location }}</td>
                                    <td class="border border-gray-400 px-4 py-2">
                                    <div class="flex space-x-4 justify-center">
                                        <a href="{{ route('jobs.edit', $job->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all transform hover:scale-105">
                                            Edit
                                        </a>
                                        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST" class="inline">
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
