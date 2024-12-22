<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Team Members') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('team-members.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Add New Team Member
                    </a>

                    <table class="table-auto w-full mt-4 border-collapse border border-gray-400">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="border border-gray-400 px-4 py-2">#</th>
                                <th class="border border-gray-400 px-4 py-2">Picture</th>
                                <th class="border border-gray-400 px-4 py-2">Name</th>
                                <th class="border border-gray-400 px-4 py-2">Surname</th>
                                <th class="border border-gray-400 px-4 py-2">Position</th>
                                <th class="border border-gray-400 px-4 py-2">Short Profile</th>
                                <th class="border border-gray-400 px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamMembers as $teamMember)
                                <tr>
                                    <td class="border border-gray-400 px-4 py-2">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-400 px-4 py-2">
                                        <img src="{{ $teamMember->picture }}" alt="Team Member Picture" class="h-8 w-8 rounded-full">
                                    </td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $teamMember->name }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $teamMember->surname }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $teamMember->position->name ?? 'N/A' }}</td>
                                    <td class="border border-gray-400 px-4 py-2">{{ $teamMember->short_profile }}</td>
                                    <td class="border border-gray-400 px-4 py-2">
                                        <div class="flex space-x-4 justify-center">
                                            <a href="{{ route('team-members.edit', $teamMember->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition-all transform hover:scale-105">
                                                Edit
                                            </a>
                                            <form action="{{ route('team-members.destroy', $teamMember->id) }}" method="POST" class="inline">
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

