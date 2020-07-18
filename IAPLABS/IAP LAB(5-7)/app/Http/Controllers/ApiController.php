<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\newCar;
use App\Car;

class ApiController extends Controller
{
    public function search($id){
        $car = Car::where('id', '=', $id)->get();
        return json_encode($car);
    }

}
