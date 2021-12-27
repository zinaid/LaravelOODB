<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Početna-Auta') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="\add_car" class="m-2 p-2 text-xl flex items-center justify-end">Dodaj auto</a>      
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                        <h1 class="font-xl mb-4 text-center">Ovdje će biti izlistana auta</h1>
                    <hr/>
                    @foreach ($cars as $car)
                    <div class="flex space-x-4">
                        <div class="flex-1"><p class="p-2"> {{ $car->name }} - {{ $car->year }} </div>
                        <div class="flex-1">
                            <form method="POST" action="{{ route('delete_car') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$car->id}}">
                            <div class="p-2">
                                <button class="ml-4 inline-flex items-center px-4 py-2 bg-red-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase ml-4">
                                    {{ __('Obrisi') }}
                                </button>
                            </div>
                            </form>
                        </div>
                        <div class="flex-1">
                            <form method="POST" action="{{ route('edit_car') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$car->id}}">
                            <div class="p-2">
                                <button class="ml-4 inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase">
                                    {{ __('Uredi') }}
                                </button>
                            </div>
                            </form>
                        </div>
                        <div class="flex-1">
                            <form method="POST" action="{{ route('file_add') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{$car->id}}">
                            <div class="p-2">
                                <button class="ml-4 inline-flex items-center px-4 py-2 bg-green-700 border border-transparent rounded-md 
                                font-semibold text-xs text-white uppercase">
                                    {{ __('Dodaj fajl') }}
                                </button>
                            </div>
                            </form>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

