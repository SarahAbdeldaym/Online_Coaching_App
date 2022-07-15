@extends('coach.index')

@section('pageTitle', trans('admin.admins'))

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="card-title">{{ $title }}</div>
        </div>
        <div class="card-body">
            {!! $dataTable->table(['class' => 'dataTable table table-striped table-hover table-bordered'], true) !!}
        </div>
    </div>

    <!-- Confirm modal view using by ajax -->

    <div id="ajax_confirm" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Confirm</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body" id="ajax_confirm_content">
                    @csrf
                    <h4 class="mb-3">{{ trans('admin.confirm_this') }}</h4>
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ trans('admin.no') }}</button>
                    <button class="btn btn-primary" id="confirm_button">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!--delete all modal view using by ajax-->

    <div id="mutlipleDelete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('admin.delete') }}</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="empty_record hidden">
                        <h4>{{ trans('admin.please_check_some_records') }} </h4>
                    </div>
                    <div class="alert alert-danger print-error-msg" style="display:none">
                        <ul></ul>
                    </div>
                    <div class="not_empty_record hidden">
                        <h4>{{ trans('admin.ask_delete_item') }} <span class="record_count"></span> ? </h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="empty_record hidden">
                        <button type="button" class="btn btn-default"
                            data-dismiss="modal">{{ trans('admin.close') }}</button>
                    </div>
                    <div class="not_empty_record hidden">
                        @csrf
                        <button type="button" class="btn btn-info" data-dismiss="modal">{{ trans('admin.no') }}</button>
                        <button class="btn btn-danger" id="ajax_delete_all">{{ trans('admin.yes') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('js')
        {!! $dataTable->scripts() !!}
        @include('coach.appointments.modals.script')
    @endpush

@endsection
