<script>
    function printErrorMsg(data) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display', 'block');

        $.each(data.responseJSON.errors, function(key, value) {
            $(".print-error-msg").find("ul").append('<li>' + value[0] + '</li>');
        });
        if (data.responseJSON.error != null) {
            $(".print-error-msg").find("ul").append('<li>' + data.responseJSON.error + '</li>');
        }
    }


    //////////////////////////
    // Ajax handler for show//
    //////////////////////////
    $(document).ready(function() {
        $(document).on('click', '.show-ajax', function() {
            $.ajax({
                url: '{{ adminUrl('') }}/feedbacks/' + $(this).data('ajax'),
                type: 'get',
                success: function(data) {
                    $('#ajax_view_content').html(data);
                }
            });
        });
    });


    ////////////////////////////
    // Ajax handler for delete//
    ////////////////////////////
    $(document).ready(function() {
        var _id = 0;
        $(document).on('click', '.delete-ajax', function() {
            $(".print-error-msg").css('display', 'none');
            console.log($(this).data('ajax'));
            _id = $(this).data('ajax');
        });
        $(document).on('click', '#ajax_delete_content #delete', function() {
            $.ajax({
                url: '{{ adminUrl('') }}/feedbacks/' + _id,
                type: 'delete',
                data: {
                    _token: $('#ajax_delete_content [name=_token]').val(),
                },
                success: function(data) {
                    toastr.success(data.success, 'Success Alert', {
                        timeOut: 10000,
                        closeButton: true,
                        progressBar: true
                    });
                    $('#ajax_delete').modal('toggle');
                    $('.buttons-reload').trigger("click");
                },
                error: function(data) {
                    printErrorMsg(data);
                }
            });
        });
    });

    ////////////////////////////////
    // Ajax handler for delete all//
    ////////////////////////////////
    $(document).ready(function() {
        $(document).on('click', '#ajax_delete_all', function() {
            $(".print-error-msg").css('display', 'none');
            var items = [];
            $.each($(".item_checkbox[name='item[]']:checked"), function() {
                items.push($(this).val());
            });
            $.ajax({
                url: '{{ route('feedbacks.destroyAll') }}',
                type: 'delete',
                data: {
                    _token: $('#mutlipleDelete [name=_token]').val(),
                    item: items
                },
                success: function(data) {
                    toastr.success(data.success, 'Success Alert', {
                        timeOut: 10000,
                        closeButton: true,
                        progressBar: true
                    });
                    $('#mutlipleDelete').modal('toggle');
                    $('.buttons-reload').trigger("click");
                },
                error: function(data) {
                    printErrorMsg(data);
                }
            });
        });
    });


    //=========clear fields function=========//
    function clearFields() {
        $('#ajax_create_content #name_en').val('');
        $('#ajax_create_content #name_ar').val('');
        $('#ajax_create_content #code').val('');
        $('#ajax_create_content #ajax_create_errors').html('');
    }
</script>
