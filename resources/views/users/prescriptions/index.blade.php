<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Prescriptions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        User Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Delevery Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Delevery Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($prescriptions as $prescription)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ $prescription->user->name }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $prescription->delevery_date.' '.$prescription->start_time.'-'.$prescription->end_time  }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <span>{{ $prescription->address_line_1 }}</span>
                                            <br>
                                            <span>{{ $prescription->address_line_2 }}</span>
                                            <br>
                                            <span>{{ $prescription->address_line_3 }}</span>
                                        </td>
                                        <td>
                                            @if ($prescription->status === 0)
                                                <span class="bg-red-200 text-red-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Rejected</span>
                                            @endif
                                            @if ($prescription->status === 1)
                                                <span class="bg-green-200 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Accepted</span>
                                            @endif
                                            @if ($prescription->status === null)
                                                <span class="bg-blue-200 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">Pending</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="{{ route('prescriptions.show',$prescription->id) }}"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Show Quotation</a>
                                        </td>
                                    </tr>
                                @empty
                                    <span>There have no records found</span>
                                @endforelse


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
