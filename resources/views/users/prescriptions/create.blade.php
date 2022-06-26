<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Upload Prescription') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->has('success'))
                        <div class="mt-3 list-disc list-inside text-sm text-green-900 bg-green-300 px-6 py-3">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form action="{{ route('prescriptions.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <x-label for="prescription" :value="__('Prescriptions')" />

                            <x-input id="prescription" class="block mt-1 w-full" type="file" name="prescription[]" required multiple/>
                        </div>

                        <div class="mt-4">
                            <x-label for="note" :value="__('Note')" />
                            <textarea name="note" id="note"
                                class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full"
                                cols="30" rows="5">
                                    {{ old('note') }}
                            </textarea>
                        </div>

                        <div class="mt-4">
                            <x-label for="address_line_1" :value="__('Address Line 1')" />

                            <x-input id="address_line_1" class="block mt-1 w-full" type="text" name="address_line_1" :value="old('address_line_1')" required />
                        </div>
                        <div class="mt-4">
                            <x-label for="address_line_2" :value="__('Address Line 2')" />

                            <x-input id="address_line_2" class="block mt-1 w-full" type="text" name="address_line_2" :value="old('address_line_2')" required />
                        </div>
                        <div class="mt-4">
                            <x-label for="address_line_3" :value="__('Address Line 3')" />

                            <x-input id="address_line_3" class="block mt-1 w-full" type="text" name="address_line_3" :value="old('address_line_3')" />
                        </div>

                        <livewire:show-time-slots />

                        <div class="mt-4">
                            <x-button class="ml-3">
                                {{ __('Submit') }}
                            </x-button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
