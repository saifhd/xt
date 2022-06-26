<div class="flex-col space-y-4 border-2 p-2">
    @if(count($datas)>0)
    <div class="card brrder border-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Drug
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Amount
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $data)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                {{ $data['drug'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $data['price'] }} X {{ $data['quantity'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $data['amount'] }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif

    @if (auth()->user()->user_level == 1)
        <div class="flex-col justify-end space-y-4">
            <div class="flex justify-end space-x-4">
                <label for=""> Drug</label>
                <input type="text" wire:model="drug">
            </div>
            <div class="flex justify-end space-x-4">
                <label>Quantity</label>
                <input type="number" wire:model="quantity">
            </div>
            <div class="flex justify-end space-x-4">
                <button class="button text-white bg-gray-600 px-6 py-2 rounded-md" wire:click='addItem'>Add</button>
            </div>
        </div>
        <form class="mt-4" action="{{ route('quotation.store') }}" method="post">
        @csrf
            <input type="text" name="prescription_id" value="{{ $prescription_id }}" hidden>
            @foreach ($datas as $data)
                <input type="text" name="drugs[]" value="{{ $data['drug'] }}" hidden>
                <input type="text" name="quantity[]" value="{{ $data['quantity'] }}" hidden>
                <input type="text" name="price[]" value="{{ $data['price'] }}" hidden>
            @endforeach
            @if(count($datas)>0)
            <div class="flex justify-end space-x-4">
                <button type="submit" class="button text-white bg-gray-600 px-6 py-2 rounded-md">Send Quotation</button>
            </div>
            @endif
        </form>
    @endif
</div>

