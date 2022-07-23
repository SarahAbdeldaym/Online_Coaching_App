@extends('admin.index')

@section('content')
    <div id="static_id" class="statistics">

        <div class="container">
            <span id="statistics_id">
                <div class="row mt-4 d-flex justify-content-center">
                    <div class="col-sm-4 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-2 w-100">@lang('admin.coaches_specialists')</h5>
                                <canvas id="myChart_1" width="200" height="200"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </span>
        </div>
    </div>

    @push('js')
        <script>
            //calculate total price of days
            $(document).ready(function() {
                $(document).on('change', '#seleted_year', function() {
                    var year = $('#seleted_year').val();
                    console.log("year", year);

                    charts.coach_revenue(year);
                });
            });
        </script>
    @endpush
@endsection
