<div>
    <div class="mt-4">
        <x-label for="delevery_date" :value="__('Delevery Date')" />

        <input
            wire:model = "delevery_date"
            wire:change = "dateChange()"
            id="delevery_date"
            class="block mt-1 w-full"
            type="date"
            min="{{ date('Y-m-d') }}"
            name="delevery_date"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
            required
        />
    </div>

    <div class="mt-4">
        <x-label for="delevery_time" :value="__('Delevery Time')" />
        <select
            name="delevery_time"
            id="delevery_time"
            value="{{ old('delevery_time') }}"
            class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
        >
            @forelse ($timeSlots as $timeSlot)
                <option value="{{ $timeSlot->id }}">{{ $timeSlot->start_time.' - '.$timeSlot->end_time }}</option>
            @empty
                <option selected>Please select another date</option>
            @endforelse
        </select>
    </div>
</div>
