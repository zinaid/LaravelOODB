<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Početna-Vožnja') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-4 gap-4 p-4 justify-items-center">
                    <div>
                        <h1>Upit 1.</h1>
                        <hr/>
                        @foreach($most_common_cars as $most_common_car) 
                        <p>{{$loop->iteration}}. {{$most_common_car->name}} - {{$most_common_car->brojac}}</p>
                        @endforeach
                    </div>
                    <div>
                        <h1>Upit 2.</h1>
                        <hr/>
                        @foreach($most_common_car_countries as $most_common_car_country) 
                        <p>{{$loop->iteration}}. {{$most_common_car_country->country}} - {{$most_common_car_country->brojac}}</p>
                        @endforeach
                    </div>
                    <div>
                        <h1>Upit 3.</h1>
                        <hr/>
                        <p>{{$number_of_rides}}</p>
                    </div>
                    <div>
                        <h1>Upit 4.</h1>
                        <hr/>
                        @foreach($german_car_drivers as $german_car_driver)
                        <p>{{$loop->iteration}}. {{$german_car_driver->driver_name}} - {{$german_car_driver->driver_lastname}}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

