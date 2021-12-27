<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Početna-Auta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    <h1 class="font-xl">Ovdje će biti izlistane marke auta</h1>
                    @foreach ($brands as $brand)
                        <p class="p-2">{{$loop->iteration}}. {{ $brand->name }} - {{ $brand->country }}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

