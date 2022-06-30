<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Coach;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CoachController extends Controller {
    public function index() {
        return Coach::with(['specialist', 'country'])->paginate(5);
    }

}
