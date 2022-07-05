<?php

namespace App\Http\Controllers\API;

use App\Models\Feedback;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreFeedbackRequest;

class FeedbackController extends Controller
{
    //Get All Feedbacks on Specified Coach
    public function index($id) {
        $feedbacks = Feedback::where('coach_id','=',$id)->with(['client', 'coach'])->get();
        return response()->json($feedbacks);
    }

    public function store( StoreFeedbackRequest $request) {
        $feedback = Feedback::create([
            'coach_id'     => $request->input('coach_id'),
            'client_id' => $request->input('client_id'),
            'comment'    => $request->input('comment'),
            'rate'       => $request->input('rate'),
        ]);
        if ($feedback){
            return response()->json([
                "success" => "Feedback Added Successfully",
                "status" => 201,
            ]);
        }else{
            return response()->json([
                "error" => "Something Went Wrong!!",
                "status" => 400,
            ]);
        }

    }

}
