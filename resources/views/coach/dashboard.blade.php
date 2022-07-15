@extends('coach.index')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <a href="{{ coachUrl('appointments') }}" class="col-lg-4 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ App\Models\Book::where('coach_id', coach()->user()->id)->count() }}</h3>
                        <p>My Reservations</p>
                    </div>
                </div>
            </a>
            <a href="{{ coachUrl('appointments') }}" class="col-lg-4 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ App\Models\Book::where('coach_id', coach()->user()->id)->where('confirm', 1)->count() }}
                        </h3>
                        <p>My Confirmed Reservations</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
