<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Make Quotation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session()->has('success'))
                        <div class="my-5 list-disc list-inside text-sm text-green-900 bg-green-300 px-6 py-3">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="flex space-x-4">
                        <div class="flex-col w-1/3 space-y-4 card rounded-md border border-5">
                            <div>
                                <img class="w-full" src="{{ asset('storage/'.$prescription->images->first()->image_path) }}" alt="">
                            </div>
                            <div class="flex space-x-2">
                                @foreach ($prescription->images->skip(1) as $image)
                                    <div class="flex w-1/4">
                                        <img src="{{ asset('storage/'.$image->image_path) }}" alt="">
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="w-2/3">
                            <div class="flex-col space-y-4">
                                <livewire:make-quotation :prescription="$prescription"/>
                            </div>
                        </div>
                    </div>


                </div>
                @if ($prescription->quotations_count > 0 && auth()->user()->user_level == 2)
                    <div class="flex space-x-4 px-4 py-6">
                        <form action="{{ route('prescriptions.change-status',$prescription->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="1" name="status">
                            <button type="submit" class="button px-6 py-3 bg-green-600 text-white">Accept</button>
                        </form>
                        <form action="{{ route('prescriptions.change-status',$prescription->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" value="0" name="status">
                            <button type="submit" class="button px-6 py-3 bg-red-600 text-white">Reject</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
