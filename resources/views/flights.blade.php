<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Available flights
        </h2>
    </x-slot>

    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach ($flights as $flight)
                <div class="my-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-3">
                        <div>
                            From:<br>
                            {{ $flight->origin_city }}<br>
                            {{ \Carbon\Carbon::parse($flight->departure_time)->format('d/m/Y') }}<br>
                            {{ \Carbon\Carbon::parse($flight->departure_time)->toTimeString() }}
                        </div>
                        <div>
                            To:<br>
                            {{ $flight->destination_city }}<br>
                            {{ \Carbon\Carbon::parse($flight->arrival_time)->format('d/m/Y') }}<br>
                            {{ \Carbon\Carbon::parse($flight->arrival_time)->toTimeString() }}
                        </div>
                        <div>
                            Price:<br>
                            {{ $flight->ticket_price }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
