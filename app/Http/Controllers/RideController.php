<?php

namespace App\Http\Controllers;

use App\Models\Ride;
use DB;
use Illuminate\Http\Request;

class RideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 	Ispisati auta koja su se najčešće testirala u vožnji.

        $most_common_cars = DB::table('cars')
            ->select('cars.*', DB::raw('count(*) as brojac'))
            ->groupBy('cars.id')
            ->join('rides', 'cars.id', '=', 'rides.car')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // 	Ispisati države čija auta su se najčešće testirala u vožnji.

        $most_common_car_countries = DB::table('cars')
            ->select('brands.*', DB::raw('count(*) as brojac'))
            ->groupBy('brands.id')
            ->join('rides', 'cars.id', '=', 'rides.car')
            ->join('brands', 'cars.brand', '=', 'brands.id')
            ->orderByRaw('COUNT(*) DESC')
            ->get();

        // Ispisati broj vožnji odrađenih u periodu od 1.12.2021 do 31.12.2021

        $from = '2021-12-01 00:00:00';
        $to = '2021-12-31 23:59:59';

        $number_of_rides = DB::table('rides')
            ->whereBetween('date', [$from, $to])
            ->count();

        //    Ispisati imena i prezimena vozača koji su vozili auto njemačke proizvodnje koji su voženi u periodu od 10.12.2021 do 31.12.2021.
        
        $german_car_drivers = DB::table('drivers')
            ->select('drivers.name as driver_name', 'drivers.lastname as driver_lastname')
            ->groupBy('drivers.id')
            ->join('rides', 'drivers.id', '=', 'rides.driver')
            ->join('cars', 'rides.car', '=', 'cars.id')
            ->join('brands', 'cars.brand', '=', 'brands.id')
            ->where('brands.country', 'DE')
            ->whereBetween('date', [$from, $to])
            ->get();

        return view('rides.index', 
            ['most_common_cars' => $most_common_cars, 
            'most_common_car_countries' => $most_common_car_countries, 
            'number_of_rides' => $number_of_rides, 
            'german_car_drivers' => $german_car_drivers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function show(Ride $ride)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function edit(Ride $ride)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ride $ride)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ride  $ride
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ride $ride)
    {
        //
    }
}
