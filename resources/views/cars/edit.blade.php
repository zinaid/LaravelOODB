<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Početna-Auta-Uredi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-2">
                    @foreach($cars as $car)
                    <form method="POST" action="{{ route('update_car') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{$car->id}}"/>
                        <div>
                            <x-jet-label for="name" value="{{ __('Naziv') }}" />
                            <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$car->name}}" required autofocus />
                        </div> 
                        <div class="mt-4">
                            <x-jet-label for="year" value="{{ __('Godina') }}" />
                            <x-jet-input id="year" class="block mt-1 w-full" type="date" name="year" value="{{$car->year}}" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="engine" value="{{ __('Motor') }}" />
                            <x-jet-input id="engine" class="block mt-1 w-full" type="text" name="engine" value="{{$car->engine}}" required autofocus />
                        </div>
                        <div class="mt-4">
                            <x-jet-label for="code" value="{{ __('Sifra') }}" />
                            <x-jet-input id="code" class="block mt-1 w-full" type="number" name="code" value="{{$car->code}}" required autofocus />
                        </div> 
                        <div class="mt-4">
                            <x-jet-label for="brand" value="{{ __('Brend') }}" />
                            <select id="brand" name="brand" class="form-select block w-full mt-1 border-gray-300 focus:border-indigo-300 
                            focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
                                <option>Odaberi</option>
                                @foreach($brands as $brand)
                                <option value="{{$brand->id}}" 
                                @if($car->brand == $brand->id) selected 
                                @endif>{{$brand->name}}</option>
                                @endforeach
                            </select> 
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-jet-button class="ml-4">
                                {{ __('Spremi') }}
                            </x-jet-button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>