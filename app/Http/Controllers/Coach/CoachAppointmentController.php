<?php

namespace App\Http\Controllers\Coach;

use App\Models\Book;
use App\Http\Controllers\Controller;
use App\DataTables\CoachAppointmentDatatable;

class CoachAppointmentController extends Controller
{
    public function index(CoachAppointmentDatatable $book)
    {

        return $book->render('coach.appointments.index',
        ['title' => 'Appointments Control']);
    }

    public function show($book_id)
    {
        $book = Book::find($book_id);
        return view('coach.appointments.modals.show', compact('book'));
    }


   
}
