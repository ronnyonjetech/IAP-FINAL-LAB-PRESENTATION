<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Review;
use App\Http\Requests;
use App\Http\Resources\Review as ReviewResource;

class ReviewsController extends Controller
{
    public function allReviews(){
        //$allReviews = Review::paginate(2);
        
        return ReviewResource::collection(Review::all());
    }
    public function specificCar($id){
        $car = Car::where('id', '=', $id)->get();
        return view('pages.reviews', ['cars' => $car]);
    }
    public function specificCarReviews($id){
        $car = Car::where('id', '=', $id)->first();
        return json_encode($car->reviews);
    }
    public function specificReviewCarDetails($id){
        $review = Review::where('id', '=', $id)->first();
        return json_encode($review->car);
    }
    public function specificReview($id){
        return new ReviewResource(Review::findOrFail($id));
    }
    
}
