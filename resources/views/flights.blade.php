<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Available flights
        </h2>
    </x-slot>
    
    <div class="pt-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Select your departure flight from <span class="font-bold">{{ $originCity }}</span> to <span class="font-bold">{{ $destinationCity }}</span> for date <span class="font-bold text-lg">{{ $departureDate }}</span></h1>
            @foreach ($departureFlights as $flight)
                <div class="my-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-3">
                        <div>
                            <span class="font-bold">From:</span><br>
                            {{ $flight->origin_city }}<br>
                            Airport: {{ $flight->origin_airport }}<br>
                            <span class="font-bold text-2xl">{{ \Carbon\Carbon::parse($flight->departure_time)->format('h:i') }}</span>
                        </div>
                        <div>
                            <span class="font-bold">To:</span><br>
                            {{ $flight->destination_city }}<br>
                            Airport: {{ $flight->origin_airport }}<br>
                            <span class="text-2xl">{{ \Carbon\Carbon::parse($flight->arrival_time)->format('h:i') }}</span>
                        </div>
                        <div>
                            <span class="font-bold">Price:</span><br>
                            <span class="text-2xl">$ {{ $flight->ticket_price }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Select your return flight <span class="font-bold">{{ $destinationCity }}</span> to <span class="font-bold">{{ $originCity }}</span>  for date <span class="font-bold text-lg">{{ $returnDate }}</span></h1>
            @foreach ($returnFlights as $flight)
                <div class="my-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 grid grid-cols-3">
                        <div>
                            <span class="font-bold">From:</span><br>
                            {{ $flight->origin_city }}<br>
                            Airport: {{ $flight->origin_airport }}<br>
                            <span class="font-bold text-2xl">{{ \Carbon\Carbon::parse($flight->departure_time)->format('h:i') }}</span>
                        </div>
                        <div>
                            <span class="font-bold">To:</span><br>
                            {{ $flight->destination_city }}<br>
                            Airport: {{ $flight->origin_airport }}<br>
                            <span class="text-2xl">{{ \Carbon\Carbon::parse($flight->arrival_time)->format('h:i') }}</span>
                        </div>
                        <div>
                            <span class="font-bold">Price:</span><br>
                            <span class="text-2xl">$ {{ $flight->ticket_price }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
