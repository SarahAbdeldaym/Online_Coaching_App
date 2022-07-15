@extends('admin.index')
@section('pageTitle', trans('admin.dashboard'))
@section('content')
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="{{ adminUrl('coaches') }}" class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ App\Models\Coach::count() }}</h3>
                        <p>Coaches</p>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="{{ adminUrl('clients') }}" class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ App\Models\Client::count() }}</h3>
                        <p>Clients</p>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="{{ adminUrl('books') }}" class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ App\Models\Book::count() }}</h3>
                        <p>Reservations</p>
                    </div>
                </a>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <a href="{{ adminUrl('books') }}" class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ App\Models\Book::where('confirm', 1)->count() }}</h3>
                        <p>Confirmed Reservations</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

@endsection
