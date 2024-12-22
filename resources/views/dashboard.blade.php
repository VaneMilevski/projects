
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl mb-4 flex items-center font-bold text-blue-400">
                        Messages
                        @if ($unreadCount = \App\Models\ContactForm::where('is_read', false)->count())
                            <span class="ml-2 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 bg-red-600 rounded-full">{{ $unreadCount }}</span>
                        @endif
                    </h3>
                    <ul>
                        @forelse ($messages = \App\Models\ContactForm::orderBy('created_at', 'desc')->take(5)->get() as $message)
                            <li class="flex items-center justify-between py-4 px-6 bg-white shadow-md rounded-lg mb-4">
                                <div>
                                    <p class="font-bold text-blue-600">{{ $message->email }}</p>
                                    <p class="mt-1 text-gray-700 font-medium">{{ $message->subject }}</p>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="message {{!$message->is_read ? 'text-red-500' : 'text-green-500' }} font-semibold">
                                        @if ($message->is_read)
                                            <p class="text-sm">Read</p>
                                        @else
                                            <p class="text-sm">Unread</p>
                                        @endif
                                    </div>
                                    <form action="{{ route('messages.destroy', $message->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 text-sm text-white bg-red-500 rounded-lg hover:bg-red-700">
                                            Delete This Message
                                        </button>
                                    </form>
                                    <button class="px-4 py-2 text-sm text-white bg-blue-500 rounded-lg hover:bg-blue-700" 
                                        onclick="document.getElementById('message-{{ $message->id }}').classList.remove('hidden')">
                                        Read This Message
                                    </button>
                                </div>
                            </li>
                        @empty
                            <li class="py-4 px-6 bg-white shadow-md rounded-lg text-gray-500 text-center font-bold ">
                                No messages yet.
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @foreach ($messages as $message)
    <div class="hidden fixed z-10 inset-0 overflow-y-auto" id="message-{{ $message->id }}" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg px-6 pt-6 pb-6 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
                <div class="absolute top-0 right-0 pt-4 pr-4">
                    <button type="button" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="document.getElementById('message-{{ $message->id }}').classList.add('hidden')">
                    <span class="sr-only">Close</span>
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                    </button>
                </div>

                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:text-left">
                        <h3 class="text-lg leading-6 font-bold text-gray-900" id="modal-title">
                            {{ $message->subject }}
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                {{ $message->message }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mt-5 sm:mt-4 sm:flex sm:flex-row-reverse gap-4">
                    
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm" onclick="document.getElementById('message-{{ $message->id }}').classList.add('hidden')">
                        Cancel
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm" onclick="updateMessageAsRead('{{ $message->id }}'); location.reload();">
                        Mark as Read
                    </button>

                    <script>
                        function updateMessageAsRead(messageId) {
                            fetch(`/messages/${messageId}/read`, {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                },
                                body: JSON.stringify({
                                    is_read: true
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.success) {
                                    // Change the UI to show the message as read
                                    document.querySelector(`#message-${messageId} .text-blue-500`).classList.add('text-gray-500');
                                    
                                    // Update unread count
                                    const counter = document.querySelector('.bg-red-600');
                                    if (counter) {
                                        let unreadCount = parseInt(counter.textContent);
                                        unreadCount = unreadCount - 1;  // Decrement unread count
                                        counter.textContent = unreadCount;
                                        // Remove the unread count if it's zero
                                        if (unreadCount === 0) {
                                            counter.remove();
                                        }
                                    }
                                    // Reload the page
                                    location.reload();
                                }
                            })
                            .catch(error => console.error('Error:', error));
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-4 text-center text-gray-800">
                        Job Statistics (Last Year)
                    </h3>
                    <canvas id="jobChart"></canvas>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const jobStats = JSON.parse(`<?php echo json_encode($jobStats); ?>`);

    const months = jobStats.map(item => {
        const date = new Date(item.month + '-01');
        const monthName = date.toLocaleString('default', { month: 'long' });
        return monthName;
    });
    const jobCounts = jobStats.map(item => item.job_count);

    const ctx = document.getElementById('jobChart').getContext('2d');

    // Create a gradient for the bar chart
    const gradient = ctx.createLinearGradient(0, 0, 0, 400);
    gradient.addColorStop(0, '#42A5F5'); // Light Blue
    gradient.addColorStop(1, '#1565C0'); // Dark Blue

    const jobChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Jobs Published',
                data: jobCounts,
                backgroundColor: gradient,
                borderColor: '#1E88E5',
                borderWidth: 1,
                hoverBackgroundColor: '#1E88E5',
                hoverBorderColor: '#1565C0',
            }],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        color: '#333',
                        font: {
                            size: 14,
                        },
                    },
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return `Jobs: ${tooltipItem.raw}`;
                        },
                    },
                },
            },
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Month',
                        color: '#333',
                        font: {
                            size: 14,
                            weight: 'bold',
                        },
                    },
                    ticks: {
                        color: '#555',
                        font: {
                            size: 12,
                        },
                    },
                    grid: {
                        display: false,
                    },
                },
                y: {
                    title: {
                        display: true,
                        text: 'Number of Jobs',
                        color: '#333',
                        font: {
                            size: 14,
                            weight: 'bold',
                        },
                    },
                    ticks: {
                        color: '#555',
                        font: {
                            size: 12,
                        },
                        beginAtZero: true,
                    },
                    grid: {
                        color: 'rgba(0, 0, 0, 0.1)',
                    },
                },
            },
        },
    });
</script>

</x-app-layout>
