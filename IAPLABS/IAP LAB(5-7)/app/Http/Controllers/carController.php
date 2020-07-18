<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\newCar;
use App\Car;


class carController extends Controller
{
    public function allCars(){
        $car = Car::all();
        return view('car', ['cars' => $car]);
    }
    public function specificCar($id){
        $car = Car::where('id', '=', $id)->get();
        return view('car', ['cars' => $car]);
    }
    

    public function newCar(newCar $request){

        $car = new Car;
        $car->make = request('make');
        $car->model = request('model');
        $car->produced_on = request('production');
        if($car->save()){
            $request->session()->flash('form_status', 'Save operation was successful');
            return view('pages.newcar');
        }else{
            $request->session()->flash('form_status', 'Save operation failed');
            return view('pages.newcar');
        }
        
        
    }
}
