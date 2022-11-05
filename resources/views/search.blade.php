<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <h1 class="text-2xl">Search for a flight</h1>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <form method="GET" action="{{ route('flights') }}">
                <div>
                    <label for="origin" class="block font-medium text-sm text-gray-700">
                        Origin
                    </label>
                    <select name="origin_city" id="origin" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select a city</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
      
                    <x-input-error :messages="$errors->get('origin')" class="mt-2" />
                </div>
      
                <div class="mt-4">
                    <label for="destination" class="block font-medium text-sm text-gray-700">
                        Destination
                    </label>
                    <select name="destination_city" id="destination" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        <option value="">Select a city</option>
                        @foreach ($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
      
                    <x-input-error :messages="$errors->get('destination')" class="mt-2" />
                </div>
      
                <div class="mt-8">
                    <label for="departure" class="block font-medium text-sm text-gray-700">
                        From
                    </label>
                    <input type="date" name="departure_time" id="departure" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      
                    <x-input-error :messages="$errors->get('departure')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <label for="arrival" class="block font-medium text-sm text-gray-700">
                        To
                    </label>
                    <input type="date" name="arrival_time" id="arrival" class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
      
                    <x-input-error :messages="$errors->get('arrival')" class="mt-2" />
                </div>
      
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button class="ml-3">
                        {{ __('Search') }}
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>