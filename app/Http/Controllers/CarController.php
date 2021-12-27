<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = DB::table('cars')
            ->get();
        
        return view('cars.index', ['cars' => $cars]);

    }

    public function file_add(Request $request)
    {
        $id=$request->id;
        
        $cars = Car::find($id);

        return view('cars.file_add', ['id' => $id , 'cars' => $cars]);

    }

    public function process(Request $request)
    {
        $id=$request->id;
        
        $cars = Car::find($id);

        $folder_to_save = $cars->code;

        $file = $request->file('file');

        $filename = $cars->id . time() . '.' . $file->getClientOriginalExtension();

        $path = $file->storeAs($folder_to_save, $filename);

        return redirect()->route('cars');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = DB::table('brands')
            ->get();

        return view('cars.add', ['brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        DB::table('cars')->insert([
            'name' => $request->name,
            'year' => $request->year,
            'engine' => $request->engine,
            'code' => $request->code,
            'brand' => $request->brand,
         ]);

        return redirect()->route('cars');

    }

    public function delete(Request $request){
        $id=$request->id;
        
        Car::destroy($id);

        return redirect()->route('cars');

    }

    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $id = $request->id;

        $cars = DB::table('cars')
        ->where('id', $id)
        ->get();

        $brands = DB::table('brands')
        ->get();
    
        return view('cars.edit', ['cars' => $cars , 'brands' => $brands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'name' => 'required|string|max:255',
            'engine' => 'required|integer',
        ]);

        $update_query = DB::table('cars')
        ->where('id', $id)
        ->update([
            'name' => $request->name,
            'year' => $request->year,
            'engine' => $request->engine,
            'code' => $request->code,
            'brand' => $request->brand,
            ]);

        return redirect()->route('cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        
    }
}
