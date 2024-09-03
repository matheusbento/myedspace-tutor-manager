<div x-data="{ showFilters: false }" class="container px-4 py-8 mx-auto">
    <div class="grid grid-cols-1 gap-8 md:grid-cols-4">
        <!-- Filters Section on the Left -->
        <div class="col-span-1">
            <div>
                <label class="block mb-2 font-bold">Subject or Hourly Rate</label>
                <input type="text" wire:model.debounce.300ms="liveSearch"
                    placeholder="math, science, english, etc. or 10"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring">
            </div>

            <button @click="showFilters = !showFilters" class="px-4 py-2 mt-4 mb-4 text-black rounded-lg ">
                <span x-show="showFilters">
                    - Show less Filters
                </span>
                <span x-show="!showFilters">
                    + Show more Filters
                </span>
            </button>

            <!-- Filters Section -->
            <div x-show="showFilters" class="p-6 space-y-4 bg-white rounded-lg shadow-md">
                <div class="grid grid-cols-1 gap-4">

                    <div>
                        <label class="block mb-2 font-bold">Subjects</label>
                        <select wire:model="subjectsSearch" multiple
                            class="w-full px-4 py-2 border rounded-lg focus:outline-none">
                            @foreach ($subjects as $subject)
                                <option value="{{ $subject }}">{{ $subject }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="relative mb-8">
                        <label for="min-input" class="font-bold">Min Hourly Rate</label>
                        <input id="min-input" type="range" wire:model="minHourlySearch" min="{{ $minHourly }}"
                            max="{{ $maxHourly }}" class="w-full h-2 rounded-lg cursor-pointer accent-primary">
                        <span class="absolute text-sm text-gray-500 dark:text-gray-400 start-0 -bottom-6">Min
                            (${{ number_format($minHourly, 2) }})</span>
                        <span
                            class="absolute text-sm text-gray-500 -translate-x-1/2 dark:text-gray-400 start-1/2 rtl:translate-x-1/2 -bottom-6">${{ number_format($maxHourly / 2, 2) }}</span>
                        <span class="absolute text-sm text-gray-500 dark:text-gray-400 end-0 -bottom-6">Max
                            (${{ number_format($maxHourly, 2) }})</span>
                    </div>

                    <div class="relative mb-8">
                        <label for="max-input" class="font-bold">Max Hourly Rate</label>
                        <input id="max-input" type="range" wire:model="maxHourlySearch" min="{{ $minHourly }}"
                            max="{{ $maxHourly }}" class="w-full h-2 rounded-lg cursor-pointer accent-primary">
                        <span class="absolute text-sm text-gray-500 dark:text-gray-400 start-0 -bottom-6">Min
                            (${{ number_format($minHourly, 2) }})</span>
                        <span
                            class="absolute text-sm text-gray-500 -translate-x-1/2 dark:text-gray-400 start-1/2 rtl:translate-x-1/2 -bottom-6">${{ number_format($maxHourly / 2, 2) }}</span>
                        <span class="absolute text-sm text-gray-500 dark:text-gray-400 end-0 -bottom-6">Max
                            (${{ number_format($maxHourly, 2) }})</span>
                    </div>
                </div>
            </div>

            <button wire:click="search" class="w-full px-4 py-2 mt-4 text-white rounded-lg fi-button bg-primary">
                Search Tutors
            </button>
        </div>

        <!-- Content Section on the Right -->
        <div class="col-span-3">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                @forelse($tutors as $tutor)
                    <div class="p-6 bg-white rounded-lg shadow-md">
                        <img src="{{ asset('storage/' . $tutor->avatar) }}" alt="Avatar"
                            class="w-16 h-16 mx-auto rounded-full">
                        <h3 class="mt-4 text-lg font-bold text-center">{{ $tutor->name }}</h3>
                        <p class="mt-2 text-center">
                            @foreach ($tutor->subjects as $subject)
                                <span
                                    class="inline-flex items-center px-2 py-1 text-xs font-medium text-gray-600 rounded-md bg-gray-50 ring-1 ring-inset ring-gray-500/10">{{ $subject }}</span>
                            @endforeach
                        </p>
                        <p class="mt-2 text-center text-gray-700">${{ number_format($tutor->hourly_rate, 2) }}/hour</p>
                    </div>
                @empty
                    <p class="text-center text-gray-500">No tutors found.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
