<?php

namespace App\Http\Controllers\API;

use App\Models\Feedback;
use App\Http\Controllers\Controller;




class FeedbackController extends Controller
{
    //Get All Feedbacks on Specified Coach
    public function index($id) {
        $feedbacks = Feedback::where('coach_id','=',$id)->with(['client', 'coach'])->get();
        return response()->json($feedbacks);
    }


}
