<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Models\Coach;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller {
    public function index() {
        $books = Book::with('coach')->with('client')->get();
        return $books;
    }

}
