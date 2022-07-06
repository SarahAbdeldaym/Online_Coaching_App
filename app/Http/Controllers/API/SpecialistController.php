<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Specialist;

class SpecialistController extends Controller
{
    public function index()
    {
        $specialist = Specialist::select('id', 'name_en')->get();
        return $specialist;
    }
}
